<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class DanhGiaValueObject implements ValueObject
{
    public function __construct(
        private int $sanpham_id,
        private int $khachhang_id,
        private string|null $noi_dung,
        private int $so_sao,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'sanpham_id' => $this->sanpham_id,
            'khachhang_id' => $this->khachhang_id,
            'noi_dung' => $this->noi_dung,
            'so_sao' => $this->so_sao
        ];
    }
}
