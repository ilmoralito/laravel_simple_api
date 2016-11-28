<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'customer_id',
        'country_id',
        'amount',
        'date'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
