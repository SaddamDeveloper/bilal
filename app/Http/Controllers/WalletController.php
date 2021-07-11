<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyResource;
use App\Http\Resources\UserBalanceResource;
use App\Models\Currency;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $currencies = Currency::paginate(config('wallex.defaultPaginationLimit'));

        return CurrencyResource::collection($currencies);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "currency_id" => "required|numeric|exists:currencies,id"
        ]);

        $currency = $validatedData['currency_id'];
        $user = $request->user();
        $balanceExists = UserBalance::whereHas('user', function ($query) use ($currency) {
            $query->where('currency_id', $currency);
        })->first();

        if (!$balanceExists && $currency) {
            $newBalance = new UserBalance();
            $newBalance->user()->associate($user);
            $newBalance->currency()->associate($currency);
            $newBalance->amount = 0.00;

            if ($newBalance->save()) {
                return response()->json([
                    "message" => "New balance added successfully!",
                    "data" => UserBalanceResource::make($newBalance),
                ], 201);
            }
        }

        return response()->json([
            "data" => []
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
