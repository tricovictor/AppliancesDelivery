<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function filterAndPaginate($name) {
        return User::name($name)->orderBy('id', 'ASC')->paginate(10);
    }

    public function scopeName($query, $name) {

        if(trim($name) != "") {
            $query->where('name', "LIKE", "%$name%");
        }
    }


    public function friend() {
        return $this->hasMany('App\Friend');
    }    
}
