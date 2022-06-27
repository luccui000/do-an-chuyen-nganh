<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'background_image',
        'slider_image',
        'primary_text',
        'secondary_text',
        'description',
        'url',
        'link_product',
        'is_top',
        'created_at',
        'updated_at',
    ];
    protected function sliderImage(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => url($value)
        );
    }
    protected function backgroundImage(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => url($value)
        );
    }
}
