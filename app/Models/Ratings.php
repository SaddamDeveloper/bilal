<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ratings extends Model
{
    protected $table = 'ratings';

    public static function getRatings($user_id){
    	return static::where('user_id',$user_id)
    		->select(
    			'completed_exchanges as completed',
    			'activy_rating as activy',
    			'average_transfer',
    			'average_confirm',
    			'limit_offers',
    			'active_offers'
    		)->first();
    }
}
