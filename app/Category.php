<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
