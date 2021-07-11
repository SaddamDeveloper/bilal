<?php 

namespace App\Http\Controllers;

use App\Http\Resources\ConvertCurrencyResource;
use App\Http\Resources\UserBalanceResource;
use App\Models\ConvertCurrency;
use App\Models\MidrateFx;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\Currency;
use App\Rules\TransferAmountValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * @param $currency_id
     * @return UserBalanceResource|\Illuminate\Http\JsonResponse
     */
    public function balance($currency_id)
    {
        $user = Auth::id();
        $balance = UserBalance::with('user', 'currency')
            ->where('user_id', $user)->where('currency_id', $currency_id)->first();

        if ($balance) {
            return UserBalanceResource::make($balance);
        }

        return response()->json([
            'data' => [],
        ], 400);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function convert(Request $request)
    {
        $validatedData = $request->validate([
            'source_currency' => 'required|numeric|exists:currencies,id',
            'target_currency' => 'required|numeric|exists:currencies,id',
            'amount' => ['required', 'numeric', new TransferAmountValidation($request->user(), $request->source_currency)]
        ]);

        $user = $request->user();

        $sourceCurrency = Currency::findOrFail($validatedData['source_currency']);
        $targetCurrency = Currency::findOrFail($validatedData['target_currency']);
        $userSourceBalance = UserBalance::where('user_id', $user->id)->where('currency_id', $validatedData['source_currency'])->first();
        $userTargetBalance = UserBalance::where('user_id', $user->id)->where('currency_id', $validatedData['target_currency'])->first();

        $exchangeRate = MidrateFx::where('source', $sourceCurrency->code)->where('target', $targetCurrency->code)->first();

        if ($exchangeRate && $userTargetBalance) {
            $exchangeFeeAmount = ConvertCurrency::exchangeFeeDeducted($validatedData['amount']);
            $convertableAmount = $validatedData['amount'] - $exchangeFeeAmount;
            $convertedAmount = $convertableAmount * $exchangeRate->rate;

            $convertCurrency = new ConvertCurrency();
            $convertCurrency->user()->associate($user);
            $convertCurrency->sourceCurrency()->associate($sourceCurrency);
            $convertCurrency->targetCurrency()->associate($targetCurrency);
            $convertCurrency->source_amount = $validatedData['amount'];
            $convertCurrency->converted_amount = $convertedAmount;
            $convertCurrency->exchange_rate = $exchangeRate->rate;
            $convertCurrency->exchange_fee = $exchangeFeeAmount;

            if ($convertCurrency->save()) {
                ConvertCurrency::updateSourceBalance($userSourceBalance, $validatedData['amount']);
                ConvertCurrency::updateTargetBalance($userTargetBalance, $convertedAmount);

                return response()->json([
                    "message" => "Amount converted successfully!",
                    "data" => ConvertCurrencyResource::make($convertCurrency),
                ], 201);
            }
        }
        return response()->json([
            "data" => []
        ], 400);
    }

    public function search(Request $request)
    {
        $queryParam = $request->query('search');

        $search = Transaction::with('transactionType', 'currency', 'senderUser', 'receiverUser')
            ->whereHas('transactionType', function ($builder) use ($queryParam) {
                $builder->where('name', 'LIKE', '%' . $queryParam . '%');
            })->orWhereHas('currency', function($builder) use ($queryParam){
                $builder->where('code', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('country', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('name', 'LIKE', '%'. $queryParam .'%');
            })->orWhereHas('senderUser', function ($builder) use ($queryParam) {
                $builder->where('username', 'LIKE', '%' . $queryParam . '%')
                    ->orWhere('email', 'LIKE', '%' . $queryParam . '%');
            })->orWhereHas('receiverUser', function ($builder) use ($queryParam) {
                $builder->where('username', 'LIKE', '%'.$queryParam.'%')
                    ->orWhere('email', 'LIKE', '%'. $queryParam .'%');
            })
            ->get();

        $convertCurrencies = ConvertCurrency::with('user', 'sourceCurrency', 'targetCurrency')
            ->whereHas('user', function($builder) use ($queryParam) {
                $builder->where('username', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('email', 'LIKE', '%'. $queryParam .'%');
            })->orWhereHas('sourceCurrency', function($builder) use ($queryParam){
                $builder->where('code', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('country', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('name', 'LIKE', '%'. $queryParam .'%');
            })->orWhereHas('targetCurrency', function ($builder) use($queryParam){
                $builder->where('code', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('country', 'LIKE', '%'. $queryParam .'%')
                    ->orWhere('name', 'LIKE', '%'. $queryParam .'%');
            })
            ->get();

        return response()->json([
            'data' => [$search, $convertCurrencies],
        ], 200);
    }
}
