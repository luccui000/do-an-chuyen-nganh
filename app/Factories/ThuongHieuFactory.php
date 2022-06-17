<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\ThuongHieuValueObject;

class ThuongHieuFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new ThuongHieuValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id'): null,
            ten_thuong_hieu: data_get($attributes, 'ten_thuong_hieu')
        );
    }
}
