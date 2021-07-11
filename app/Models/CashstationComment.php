<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashstationComment extends Model
{
    use HasFactory;

    protected $table = 'cashstation_comments';
    protected $fillable = ['user_id', 'cashstation_id', 'comment'];
    protected $primaryKey = 'id';

    public static function getComment($user_id, $offset, $limit)
    {
        $data = static::join('cashstations','cashstations.id','=','cashstation_comments.cashstation_id')
            ->join('users', 'users.id', '=', 'cashstation_comments.user_id')
    		->where('cashstation_comments.user_id',$user_id);
        $data = $data->select('cashstation_comments.id','users.username as username','cashstation_comments.comment as comment', 'cashstation_comments.created_at', 'cashstation_comments.updated_at')
    		->offset($offset)->limit($limit)->get();
    
    	return $data;
    }

    /**
     * Get the user that owns the CashstationComment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cashstation()
    {
        return $this->belongsTo(Cashstation::class, 'cashstations_id', 'id');
    }
}
