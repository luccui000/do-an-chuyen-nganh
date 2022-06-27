<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\ChiTietDonHangValueObject;

class ChiTietDonHangFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new ChiTietDonHangValueObject(
            donhang_id: $attributes['donhang_id'],
            sanpham_id: $attributes['sanpham_id'],
            so_luong: $attributes['so_luong'],
            don_gia: $attributes['don_gia'],
            thanh_tien: $attributes['thanh_tien']
        );
    }
}
