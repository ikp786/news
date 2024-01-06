<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'state_id',
        'city',
        'short_description',
        'description',
        'news_type',
        'view_type',
        'status'
    ];

    function category(){
        return $this->belongsTo(Category::class);
    }
}
