<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'full_name'
    ];

    protected $hidden = [
        'country_id',
        'created_at',
        'updated_at',
        'id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
