<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\HinhAnhValueObject;

class HinhAnhFactory implements Factory
{

    public static function make(array $attributes): ValueObject
    {
        return new HinhAnhValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id') : null,
            duong_dan: data_get($attributes, 'duong_dan')
        );
    }
}
