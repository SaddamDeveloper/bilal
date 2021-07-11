<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashstationReview extends Model
{
    use HasFactory;

    protected $table = 'cashstation_reviews';
    protected $fillable = ['user_id', 'cashstation_id',    'review', 'comment'];
    protected $primaryKey = 'id';

    public static function getReview($user_id , $offset, $limit)
    {
        $data = static::join('cashstations','cashstations.id','=','cashstation_reviews.cashstation_id')
            ->join('users', 'users.id', '=', 'cashstation_reviews.user_id')
    		->where('cashstation_reviews.user_id',$user_id);
        $data = $data->select('cashstation_reviews.id','users.username as username', 'cashstation_reviews.review', 'cashstation_reviews.comment as comment', 'cashstation_reviews.created_at', 'cashstation_reviews.updated_at')
    		->offset($offset)->limit($limit)->get();
    
    	return $data;
    }

    /**
     * Get the user that owns the CashstationReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cashstation()
    {
        return $this->belongsTo(Cashstation::class, 'cashstation_id', 'id');
    }
}
