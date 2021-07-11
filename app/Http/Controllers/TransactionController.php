<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Currency;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\UserBalance;
use App\Rules\TransferAmountValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = Auth::id();

        $transactions = Transaction::with('transactionType', 'currency', 'senderUser', 'receiverUser')
            ->where('transaction_type_id', TransactionType::TYPE_SEND)->where('sender_id', $user)
            ->orWhere(function ($query) use ($user) {
                $query->where('transaction_type_id', TransactionType::TYPE_RECEIVE)->where('receiver_id', $user);
            })->orWhere(function ($query) use ($user) {
                $query->where('transaction_type_id', TransactionType::TYPE_REQUEST)->where('sender_id', $user);
            })
            ->latest()
            ->paginate(config('wallex.defaultPaginationLimit'));

        return response()->json([
            'data' => TransactionResource::collection($transactions),
        ], 200);
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
            'receiver_id' => 'required|exists:users,id',
            'currency_id' => 'required|numeric|exists:currencies,id',
            'amount' => ['required', 'numeric', new TransferAmountValidation($request->user(), $request->currency_id)]
        ]);

        $currency = Currency::findOrFail($validatedData['currency_id']);
        $receiver = User::findOrFail($validatedData['receiver_id']);
        $sender = $request->user();

        $senderBalance = UserBalance::where('user_id', $sender->id)->where('currency_id', $currency->id)->first();
        $receiverBalance = UserBalance::where('user_id', $validatedData['receiver_id'])->where('currency_id', $currency->id)->first();

        if ($senderBalance && $receiverBalance) {
            $sendTransaction = new Transaction();

            $sendTransaction->transactionType()->associate(TransactionType::find(TransactionType::TYPE_SEND));
            $sendTransaction->senderUser()->associate($sender);
            $sendTransaction->receiverUser()->associate($receiver);
            $sendTransaction->currency()->associate($currency);
            $sendTransaction->amount = $validatedData['amount'];

            $receiveTransaction = new Transaction();
            $receiveTransaction->transactionType()->associate(TransactionType::find(TransactionType::TYPE_RECEIVE));
            $receiveTransaction->senderUser()->associate($sender);
            $receiveTransaction->receiverUser()->associate($receiver);
            $receiveTransaction->currency()->associate($currency);
            $receiveTransaction->amount = $validatedData['amount'];

            if ($sendTransaction->save() && $receiveTransaction->save()) {
                UserBalance::balanceRemoved($validatedData['amount'], $senderBalance);
                UserBalance::balanceAdded($validatedData['amount'], $receiverBalance);

                return response()->json([
                    "message" => "Payment has been processed successfully!",
                    "data" => [
                        "send_transaction" => TransactionResource::make($sendTransaction),
                        "receive_transaction" => TransactionResource::make($receiveTransaction)
                    ],
                ]);
            }
        }

        return response()->json([
            "data" => []
        ], 400);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function request(Request $request)
    {
        $validatedData = $request->validate([
            'currency_id' => 'required|numeric|exists:currencies,id',
            'amount' => 'required|numeric',
            'note' => 'nullable'
        ]);

        $user = $request->user();

        $requestTransaction = new Transaction();
        $requestTransaction->transactionType()->associate(TransactionType::find(TransactionType::TYPE_REQUEST));
        $requestTransaction->senderUser()->associate($user);
        $requestTransaction->currency()->associate($validatedData['currency_id']);
        $requestTransaction->amount = $validatedData['amount'];
        $requestTransaction->note = $validatedData['note'] ?? null;

        if ($requestTransaction->save()) {
            return response()->json([
                'message' => 'Payment request has been created successfully!',
                'data' => TransactionResource::make($requestTransaction)
            ], 201);
        }

        return response()->json([
            "data" => []
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $transaction = Transaction::with('transactionType', 'currency', 'senderUser', 'receiverUser')->findOrFail($id);

        return response()->json([
            'data' => TransactionResource::make($transaction),
        ], 200);
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
