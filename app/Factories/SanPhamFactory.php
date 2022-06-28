<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\SanPhamValueObject;

class SanPhamFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new SanPhamValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id') : null,
            ten_sp: $attributes['ten_sp'],
            slug: array_key_exists('slug', $attributes) ?
                $attributes['slug'] : $attributes['ten_sp'],
            danhmuc_id: data_get($attributes, 'danhmuc_id'),
            thuonghieu_id: data_get($attributes, 'thuonghieu_id'),
            nhacungcap_id: data_get($attributes, 'nhacungcap_id'),
            quycach_id: data_get($attributes, 'quycach_id'),
            hinh_anh: array_key_exists('hinh_anh', $attributes) ?
                data_get($attributes, 'hinh_anh'): null,
            ma_sp: data_get($attributes, 'ma_sp'),
            mo_ta_ngan: data_get($attributes, 'mo_ta_ngan'),
            mo_ta: array_key_exists('mo_ta', $attributes) ?
                data_get($attributes, 'mo_ta'): null,
            gia_sp: floatval(data_get($attributes, 'gia_sp')),
            gia_khuyen_mai: floatval(data_get($attributes, 'gia_khuyen_mai')),
            sp_noi_bat: array_key_exists('sp_noi_bat', $attributes) ?
                data_get($attributes, 'sp_noi_bat'): 0
        );
    }
}
