<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'status','layout'
    ];

      protected function statuss(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value ? 'Active' : 'Inactive',
        );
    }
}
