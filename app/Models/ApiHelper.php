<?php

namespace App\Models;

use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Model;

class ApiHelper extends Model
{
    public static function sender(){
        return  TransactionType::find(1);
    }
    public static function receiver(){
        return  TransactionType::find(2);
    }
}
