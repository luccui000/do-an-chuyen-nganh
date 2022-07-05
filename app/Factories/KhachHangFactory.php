<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\KhachHangValueObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class KhachHangFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new KhachHangValueObject(
            ho_khach_hang: $attributes['ho_khach_hang'],
            ten_khach_hang: $attributes['ten_khach_hang'],
            so_dien_thoai: $attributes['so_dien_thoai'],
            ten_dang_nhap: array_key_exists('ten_dang_nhap', $attributes) ?
                $attributes['ten_dang_nhap'] : null,
            email: array_key_exists('email', $attributes) ?
                $attributes['email'] : null,
            password: array_key_exists('password', $attributes) ?
                Hash::make($attributes['password']) : null,
            dia_chi: array_key_exists('dia_chi', $attributes) ?
                $attributes['dia_chi'] : null,
            ma_xa: array_key_exists('ma_xa', $attributes) ?
                $attributes['ma_xa'] : null,
            lan_dang_nhap_cuoi: array_key_exists('lan_dang_nhap_cuoi', $attributes) ?
                $attributes['lan_dang_nhap_cuoi'] : Carbon::now(),
            ngay_xac_thuc_emai: array_key_exists('ngay_xac_thuc_email', $attributes) ?
                $attributes['ngay_xac_thuc_email'] : null,
            remember_token: array_key_exists('remember_token', $attributes) ?
                $attributes['remember_token'] : null
        );
    }
}
