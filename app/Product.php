<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'category_id', 'image', 'amount'];

    public function getImageAttribute()
    {
        return asset('storage/' . $this->attributes['image']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
