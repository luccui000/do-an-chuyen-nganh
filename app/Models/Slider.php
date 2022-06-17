<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'background_image',
        'primary_text',
        'secondary_text',
        'description',
        'url',
        'link_product',
        'is_top',
        'created_at',
        'updated_at',
    ];
}
