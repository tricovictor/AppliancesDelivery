<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "friend";

    protected $fillable = ['id', 'user_id', 'friend_id'];

    public function scopeUser_id($query, $user_id) {

        if(trim($user_id) != 0) {
            $query->where('user_id', $user_id);
        }
    } 

  	public function user() {
        return $this->belongsTo('App\User');
    }
}
