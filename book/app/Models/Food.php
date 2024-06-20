<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = ['food_category_id', 'restaurant_id', 'name', 'price',
        'image', 'description', 'time', 'is_active'];

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class, 'food_category_id');
    }
}
