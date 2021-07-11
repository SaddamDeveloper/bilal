<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvertCurrency extends Model
{
    public const CURRENCY_EXCHANGE_FEE = 0.5;

    /**
     * @param $amount
     * @return float|int
     */
    public static function exchangeFeeDeducted($amount)
    {
        return $amount * self::CURRENCY_EXCHANGE_FEE / 100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sourceCurrency()
    {
        return $this->belongsTo(Currency::class, 'source_currency', 'id');
    }

    public function targetCurrency()
    {
        return $this->belongsTo(Currency::class, 'target_currency', 'id');
    }

    public static function updateSourceBalance($userSourceBalance, $amount)
    {
        $updatedBalance = $userSourceBalance->amount - $amount;
        $userSourceBalance->amount = $updatedBalance;
        return $userSourceBalance->save();
    }

    public static function updateTargetBalance($userTargetBalance, $convertedAmount)
    {
        $updatedBalance = $userTargetBalance->amount + $convertedAmount;
        $userTargetBalance->amount = $updatedBalance;
        return $userTargetBalance->save();
    }
}
