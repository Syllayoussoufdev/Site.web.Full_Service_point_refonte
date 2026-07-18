<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['titre','slug','contenu','image','categorie','statut','date_publication','user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
