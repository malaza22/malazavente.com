<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['stock'];

    public function getPrice(){

        $price = $this->price;
        
        return number_format($price, 0,',','').' Ar';
        
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
