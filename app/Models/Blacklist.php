<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blacklist extends Model
{
    protected $table = 'blacklists';

    public static function getBlacklist($user_id, $offset, $limit){
    	return static::join('users','users.id','=','blacklists.user_id')
    		->where('users.id',$user_id)
    		->select('blacklists.id','blacklists.blacklisted_username','blacklists.comments')
    		->offset($offset)->limit($limit)->get();
    }
}
