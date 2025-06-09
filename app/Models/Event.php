<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('is_verified')->withTimestamps();
    }
}
