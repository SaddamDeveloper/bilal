<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    protected $table = 'user_balances';

    public static function getBalance($user_id, $currency_code)
    {
        return static::join('currencies', 'currencies.id', '=', 'user_balances.currency_id')
            ->select('amount', 'currencies.flag as flag')
            ->where('user_balances.user_id', $user_id)
            ->where('currencies.code', $currency_code)
            ->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    public static function balanceRemoved($amount, $senderBalance)
    {
        $newBalance = $senderBalance->amount - $amount;
        $senderBalance->amount = $newBalance;
        return $senderBalance->save();
    }

    public static function balanceAdded($amount, $receiverBalance)
    {
        $newBalance = $receiverBalance->amount + $amount;
        $receiverBalance->amount = $newBalance;
        return $receiverBalance->save();
    }
}
