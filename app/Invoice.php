<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at'];


    public function products(){

        return $this->hasMany('App\Product')->withTimestamps();

    }

    public function client(){

        return $this->belongsTo('App\Client');

    }
}
