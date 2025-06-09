<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    /** @use HasFactory<\Database\Factories\CreationFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'user_name', 'title', 'description', 'image_path', 'divisi', 'status'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
