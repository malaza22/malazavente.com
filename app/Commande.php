<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function user()
   {
    return $this->belongsTo('App\User');
   }
   protected $fillable = [
    'amount', 'payment_created_at', 'products','user_id','status','telephone'
    ];
}
