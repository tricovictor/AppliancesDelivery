<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = ['user_id', 'article_id', 'quantity', 'state', 'price', 'distributor_id',];
    
    public function article() {
        return $this->belongsTo('App\Article');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
