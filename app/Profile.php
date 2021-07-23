<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'image',
        'city',
        'state',
        'country',
        'street',
        'zip',
        'user_id',
        'slug',
        'mobile_no',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
