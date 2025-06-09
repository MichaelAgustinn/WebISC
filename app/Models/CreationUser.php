<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreationUser extends Model
{
    protected $table = 'creation_user';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
