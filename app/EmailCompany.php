<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailCompany extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'company_id'];


    public function company(){

        return $this->belongsTo('App\Company');

    }
}
