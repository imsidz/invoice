<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneCompany extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone', 'company_id'];

    public function company(){

        return $this->belongsTo('App\Company');

    }
}
