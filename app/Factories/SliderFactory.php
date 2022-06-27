<?php

namespace App\Factories;

use App\ValueObjects\SliderValueObject;
use Carbon\Carbon;

class SliderFactory
{
    public static function make(array $attributes): SliderValueObject
    {
        return new SliderValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id'): null,
            background_image: data_get($attributes, 'primary_text'),
            slider_image: array_key_exists('slider_image', $attributes) ?
                data_get($attributes, 'slider_image') : null,
            primary_text: data_get($attributes, 'primary_text'),
            secondary_text: data_get($attributes, 'secondary_text'),
            description: data_get($attributes, 'description'),
            url:  array_key_exists('url', $attributes) ?
                data_get($attributes, 'url'): '',
            link_product: array_key_exists('link_product', $attributes) ?
                data_get($attributes, 'link_product'): '',
            is_top: array_key_exists('is_top', $attributes) ?
                data_get($attributes, 'is_top'): 0,
            created_at: array_key_exists('created_at', $attributes) ?
                data_get($attributes, 'created_at'): Carbon::now(),
            updated_at: array_key_exists('updated_at', $attributes) ?
                data_get($attributes, 'updated_at'): Carbon::now(),
        );
    }
}
