<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function invoices(){

        return $this->hasMany('App\Invoice');

    }

    public function phones(){

        return $this->hasMany('App\PhoneClient');

    }
    public function emails(){

        return $this->hasMany('App\EmailClient');

    }
}
