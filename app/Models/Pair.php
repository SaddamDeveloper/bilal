<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pair extends Model
{
    protected $table = 'pairs';

    public static function getPair($group, $offset, $limit, $code=null, $alpha=null){

    	$data = static::join('currencies','currencies.id','=','pairs.currency_id')
            ->join('platforms','platforms.id','=','pairs.platform_id')
    		->select('platforms.name as platform','currencies.name as currency','currencies.code as currency_code');

	    if (!is_null($alpha)){
	       $data = $data->where('platforms.name','LIKE',strtoupper($alpha).'%'); 		
        }
    	
        if (!is_null($code)){
		    $data = $data->where('currencies.code',strtoupper($code));
	    }

        if ($group!="currency"){
        	if (is_null($code) && is_null($alpha)){
        		$data = $data->where('platforms.group',$group);
        	}
        }

    	$data = $data->offset($offset)->limit($limit)->get();

    	return $data;
    
    }

    public static function findPair($condition, $offset, $limit){
    	$data = static::join('currencies','currencies.id','=','pairs.currency_id')
            ->join('platforms','platforms.id','=','pairs.platform_id')
    		->select('platforms.name as platform','currencies.name as currency','currencies.code as currency_code')
    		->where(function($q) use ($condition){
                    $q->orWhere('platforms.name','like', "%{$condition}%")
                      ->orWhere('currencies.name','like', "%{$condition}%")
                      ->orWhere('currencies.code','like', "%{$condition}%");
            });		
    	$data = $data->offset($offset)->limit($limit)->get();
    	return $data;
    }

    public static function getPairByPlatformName($platform_name){
        $data = static::join('platforms','platforms.id','=','pairs.platform_id')
            ->select('pairs.id as id')
            ->where('platforms.name',$platform_name)->first();
        return $data;
    }

}
