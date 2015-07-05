<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
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
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categories');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function getCategoriesListAttribute() {
        return $this->categories()->lists('id')->all();
    }

    public function getTagsListAttribute() {
        return $this->tags()->lists('id')->all();
    }
}
