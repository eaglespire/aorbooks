<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'firstName',
        'gender',
        'country',
        'mail',
        'description',
        'image',
        'lastName',
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
    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }


}
