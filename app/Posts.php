<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'id_user',
        'title',
        'alias',
        'description',
        'short_description',
        'seo_description',
        'user_id',
        'hits',
        'likes',
        'status',
        'published_at',
        'tagsList',
        'categoriesList'
    ];

    public $tagsList;
    public $categoriesList;

    public function categories()
    {
        return $this->belongsToMany('App/Categories');
    }
}
