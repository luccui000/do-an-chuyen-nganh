<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\Models\DonHang;
use App\ValueObjects\DonHangValueObject;
use Illuminate\Support\Str;

class DonHangFactory implements Factory
{

    public static function make(array $attributes): ValueObject
    {
        return new DonHangValueObject(
            ma_don_hang: array_key_exists('ma_don_hang', $attributes) ?
                $attributes['ma_don_hang'] : Str::upper(Str::random(8)),
            khachhang_id: $attributes['khachhang_id'],
            magiamgia_id: array_key_exists('magiamgia_id', $attributes) ?
                $attributes['magiamgia_id']: null,
            ma_xa: $attributes['ma_xa'],
            phi_giao_hang: $attributes['phi_giao_hang'],
            thanh_tien: $attributes['thanh_tien'],
            tong_tien: $attributes['tong_tien'],
            dia_chi: $attributes['dia_chi'],
            phuong_thuc_thanh_toan: intval($attributes['phuong_thuc_thanh_toan']) == 1 ?
                DonHang::THANH_TOAN_ONLINE : DonHang::THANH_TOAN_KHI_NHAN_HANG,
            ghi_chu: array_key_exists('ghi_chi', $attributes) ?
                $attributes['ghi_chi'] : null,
            trang_thai: DonHang::DANG_CHO_XAC_NHAN
        );
    }
}
