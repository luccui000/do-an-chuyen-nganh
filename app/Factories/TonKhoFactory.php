<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\TonKhoValueObject;

class TonKhoFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new TonKhoValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id') : null,
            sanpham_id: data_get($attributes, 'sanpham_id'),
            so_luong: intval(data_get($attributes, 'so_luong'))
        );
    }
}
