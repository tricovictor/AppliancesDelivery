<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    protected $table = "quality";

    protected $fillable = ['id', 'description', 'item', 'articles_id'];

    public function scopeArticle_id($query, $article_id) {

        if(trim($article_id) != 0) {
            $query->where('articles_id', $article_id);
        }
    } 

  	public function article() {
        return $this->belongsTo('App\Article');
    }
}
