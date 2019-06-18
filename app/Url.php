<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = "urls";

    protected $fillable = ['id', 'name', 'category_name'];


}
