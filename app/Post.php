<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'body', 'published_at'];

    protected $dates = ['published_at'];

    public function getSlugAttribute()
    {
        return str_slug($this->title);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(PostTag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}