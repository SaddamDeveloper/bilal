<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    public const TYPE_SEND = 1;
    public const TYPE_RECEIVE = 2;
    public const TYPE_REQUEST = 3;

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
