<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class DonHangValueObject implements ValueObject
{
    public function __construct(
        private string $ma_don_hang,
        private int $khachhang_id,
        private int|null $magiamgia_id,
        private int $phi_giao_hang,
        private int $thanh_tien,
        private int $tong_tien,
        private string $phuong_thuc_thanh_toan,
        private string|null $ghi_chu,
        private string $trang_thai,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'ma_don_hang' => $this->ma_don_hang,
            'khachhang_id' => $this->khachhang_id,
            'magiamgia_id' => $this->magiamgia_id,
            'phi_giao_hang' => $this->phi_giao_hang,
            'thanh_tien' => $this->thanh_tien,
            'tong_tien' => $this->tong_tien,
            'phuong_thuc_thanh_toan' => $this->phuong_thuc_thanh_toan,
            'ghi_chu' => $this->ghi_chu,
            'trang_thai' => $this->trang_thai,
        ];
    }
}
