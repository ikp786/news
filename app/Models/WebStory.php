<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'city',
        'short_description',
        'status'
    ];

    function category(){
        return $this->belongsTo(Category::class);
    }
}

