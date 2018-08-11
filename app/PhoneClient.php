<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneClient extends Model
{	

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone', 'client_id'];


    public function client(){

        return $this->belongsTo('App\Client');

    }
}
