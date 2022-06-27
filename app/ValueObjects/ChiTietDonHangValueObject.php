<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class ChiTietDonHangValueObject implements ValueObject
{
    public function __construct(
        private int $donhang_id,
        private int $sanpham_id,
        private int $so_luong,
        private int $don_gia,
        private int $thanh_tien,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'donhang_id' => $this->donhang_id,
            'sanpham_id' => $this->sanpham_id,
            'so_luong' => $this->so_luong,
            'don_gia' => $this->don_gia,
            'thanh_tien' => $this->thanh_tien,
        ];
    }
}
