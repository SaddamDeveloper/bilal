<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bindings extends Model
{
    protected $table = 'bindings';

    public static function getBindings($user_id ,$offset, $limit, $platform){
    	$data = static::join('platforms','platforms.id','=','bindings.platform_id')
    		->where('bindings.user_id',$user_id);
    		
    	if ($platform){
    		$data = $data->where('platforms.name',$platform);
    	}

    	$data = $data->select('bindings.id','platforms.name as platform','bindings.account_info')
    		->offset($offset)->limit($limit)->get();

    	return $data;

    }
}
