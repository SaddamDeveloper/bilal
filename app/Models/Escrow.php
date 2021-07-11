<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Escrow extends Model
{
    protected $table = 'escrows';

    public static function getRecentTransaction($offset, $limit){
    	return static::join('offers','offers.id','=','escrows.offer_id')
    		->join('pairs','pairs.id','=','offers.pair_id')
    		->join('currencies','currencies.id','=','pairs.currency_id')
    		->join('platforms','platforms.id','=','pairs.platform_id')
    		->select(DB::raw('DATE_FORMAT(escrows.created_at, "%d %M") as date'),'escrows.direction','currencies.code as currency_code','platforms.name as platform','escrows.rates','escrows.amount')
    		->offset($offset)->limit($limit)->get();
    }
}
