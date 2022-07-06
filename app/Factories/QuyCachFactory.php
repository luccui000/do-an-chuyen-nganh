<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\QuyCachValueObject;

class QuyCachFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new QuyCachValueObject(
            tenQuyCach: $attributes['ten_quy_cach'],
            moTa: array_key_exists('mo_ta', $attributes) ?
                $attributes['mo_ta'] : null
        );
    }
}
