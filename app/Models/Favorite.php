<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Favorite extends Model
{
    protected $table = 'favorites';

    public static function getFavorite($user_id ,$offset, $limit, $platform, $currency_code){
    	$data = static::join('pairs','pairs.id','=','favorites.pair_id')
    		->leftJoin('currencies','currencies.id','=','pairs.currency_id')
    		->leftJoin('platforms','platforms.id','=','pairs.platform_id')
    		->where('favorites.user_id',$user_id)
            ->where(function($query){
                $query->where('pairs.platform_id','!=',null)
                    ->orWhere('pairs.currency_id','!=',null);
            });

    	if ($platform){
    		$data = $data->where('platforms.name',$platform);
    	}

    	if ($currency_code){
    		$data = $data->where('currencies.code',$currency_code);
    	}

    	$data = $data->select('favorites.id','platforms.name as platform','currencies.code as currency_code','currencies.name as currency')
    		->offset($offset)->limit($limit)->get();
    
    	return $data;

    }
}
