<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\DanhMucValueObject;

class DanhMucFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new DanhMucValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id') : null,
            ten_dm: data_get('ten_dm', $attributes),
            hinh_anh: array_key_exists('hinh_anh', $attributes) ?
                data_get($attributes, 'hinh_anh') : null,
            thu_tu: data_get('thu_tu', $attributes),
            la_noi_bat: array_key_exists('la_noi_bat', $attributes) ?
                data_get($attributes, 'la_noi_bat') : null,
        );
    }
}
