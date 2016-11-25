<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['full_name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
