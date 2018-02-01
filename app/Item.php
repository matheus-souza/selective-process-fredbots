<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'image',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
