<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashstation extends Model
{
    use HasFactory;

    protected $table = 'cashstations';
    protected $fillable = ['user_id', 'cashstation_comment_id', 'transaction_id', 'open_currency', 'tagline', 'max_fee_charge', 'status'];
    protected $primaryKey = 'id';

    /**
     * Get all of the comments for the Cashstation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(CashstationComment::class,'cashstation_id', 'id');
    }

    /**
     * Get all of the comments for the Cashstation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(CashstationReview::class);
    }

    /**
     * Get the user that owns the Cashstation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the user that owns the Cashstation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    /**
     * Get all of the comments for the Cashstation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function currency()
    {
        return $this->hasMany(Currency::class, 'currency_id', 'id');
    }

}
