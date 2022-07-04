<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\DanhGiaValueObject;

class DanhGiaFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new DanhGiaValueObject(
            sanpham_id: $attributes['sanpham_id'],
            khachhang_id: $attributes['khachhang_id'],
            noi_dung: array_key_exists('noi_dung', $attributes) ?
                $attributes['noi_dung'] : null,
            so_sao: $attributes['so_sao']
        );
    }
}
