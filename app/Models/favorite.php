<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    public function favorite()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
