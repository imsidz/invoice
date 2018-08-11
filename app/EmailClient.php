<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailClient extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'client_id'];

    public function client(){

        return $this->belongsTo('App\Client');

    }
}
