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
                $attributes['id'] : null,
            ten_dm: $attributes['ten_dm'],
            hinh_anh: array_key_exists('hinh_anh', $attributes) ?
                $attributes['hinh_anh'] : null,
            thu_tu: array_key_exists('thu_tu', $attributes) ?
                intval($attributes['thu_tu']): null,
            la_noi_bat: array_key_exists('la_noi_bat', $attributes) ?
                $attributes['la_noi_bat'] : null,
        );
    }
}
