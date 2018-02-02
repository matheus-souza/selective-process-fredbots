<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'image', 'displayed'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
