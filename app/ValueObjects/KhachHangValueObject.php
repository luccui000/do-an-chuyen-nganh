<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class KhachHangValueObject implements ValueObject
{
    public function __construct(
        private string $ho_khach_hang,
        private string $ten_khach_hang,
        private string $so_dien_thoai,
        private string|null $ten_dang_nhap,
        private string|null $email,
        private string|null $password,
        private string|null $dia_chi,
        private string|null $ma_xa,
        private \DateTime|null $lan_dang_nhap_cuoi,
        private \DateTime|null $ngay_xac_thuc_emai,
        private string|null $remember_token,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'ho_khach_hang' => $this->ho_khach_hang,
            'ten_khach_hang' => $this->ten_khach_hang,
            'so_dien_thoai' => $this->so_dien_thoai,
            'ten_dang_nhap' => $this->ten_dang_nhap,
            'email' => $this->email,
            'password' => $this->password,
            'dia_chi' => $this->dia_chi,
            'ma_xa' => $this->ma_xa,
            'lan_dang_nhap_cuoi' => $this->lan_dang_nhap_cuoi,
            'ngay_xac_thuc_emai' => $this->ngay_xac_thuc_emai,
            'remember_token' => $this->remember_token,
        ];
    }
}
