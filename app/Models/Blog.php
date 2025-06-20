<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'description'];

    public function getFirstImageAttribute()
    {
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument();
        $doc->loadHTML($this->description);
        $images = $doc->getElementsByTagName('img');

        if ($images->length > 0) {
            return $images->item(0)->getAttribute('src');
        }
        // dd($images);
        return 'default.jpg';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
