<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	
	protected $table = 'products';

    protected $fillable = ['productname', 'qty', 'price', 'priceinword'];

    protected $primaryKey = 'id';

    public function invoice(){

        return $this->belongsTo('App\Invoice');

    }


}
