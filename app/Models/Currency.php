<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    public static function getNewestCurrency($limit)
    {
        return static::select('currencies.code as currency_code', 'currencies.flag as flag')
            ->limit($limit)->get();
    }

    public static function getCountry($offset, $limit, $published)
    {

        $data = static::select('currencies.country as country', 'currencies.name as currency', 'currencies.code as currency_code', 'currencies.published');

        if (!is_null($published)) {
            $data->where('currencies.published', $published);
        }

        $data = $data->offset($offset)->limit($limit)->get();

        return $data;

    }

    public function userBalance()
    {
        return $this->hasOne(UserBalance::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function source()
    {
        return $this->hasOne(ConvertCurrency::class, 'source_currency', 'id');
    }

    public function target()
    {
        return $this->hasOne(ConvertCurrency::class, 'target_currency', 'id');
    }
    
}
