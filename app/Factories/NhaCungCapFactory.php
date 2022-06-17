<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\NhaCungCapValueObject;

class NhaCungCapFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new NhaCungCapValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id') : null,
            ten_ncc: data_get($attributes, 'ten_ncc'),
            ho_ten_lien_he: data_get($attributes, 'ho_ten_lien_he'),
            email: data_get($attributes, 'email'),
            dia_chi: array_key_exists('dia_chi', $attributes) ?
                data_get($attributes, 'dia_chi') : null,
            dien_thoai: array_key_exists('dien_thoai', $attributes) ?
                data_get($attributes, 'dien_thoai') : null
        );
    }
}
