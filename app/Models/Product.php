<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'subcategory_id',
        'description',
        'image',
        'old_price',
        'new_price',
        'slug',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}

