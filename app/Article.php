<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{    

	protected $table = "articles";

    protected $fillable = ['id', 'description', 'image', 'categories_id', 'price', 'code'];

    public function scopeDescription($query, $description) {

        if(trim($description) != "") {
            $query->where('description', "LIKE", "%$description%");
        }
    }

    public function scopeOrder($query, $order) {

        if(trim($order) != 0) {
            $query->where('order', $order);
        }
    } 

    public static function filterAndPaginatePrice($description, $order) {
        return Article::description($description)->orderBy('price', 'ASC')->paginate(20);
    }

    public static function filterAndPaginate($description, $order) {
        return Article::description($description)->orderBy('description', 'ASC')->paginate(20);
    }

  	public function category() {
        return $this->belongsTo('App\Category');
    }
}
