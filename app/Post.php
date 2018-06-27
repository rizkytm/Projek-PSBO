<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'slug', 'video', 'pdf'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
