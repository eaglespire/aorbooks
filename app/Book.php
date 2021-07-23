<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'image',
        'title',
        'author_id',
        'category_id',
        'description',
        'intro',
        'num_of_pages',
        'pub_date',
        'ISBN',
        'ISBN13',
        'other_authors',
        'slug',
        'file_path',
    ];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getFullName()
    {
        return "$this->firstName". " ". $this->lastName;
    }

}
