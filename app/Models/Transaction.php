<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

   
}
