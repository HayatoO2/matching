<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function favorite()
    {
        return $this->hasMany('App\Models\Favorite');
    }
}
