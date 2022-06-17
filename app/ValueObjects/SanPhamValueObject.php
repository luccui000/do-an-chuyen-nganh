<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class SanPhamValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private int $danhmuc_id,
        private int $thuonghieu_id,
        private int $nhacungcap_id,
        private string|null $hinh_anh,
        private string $ma_sp,
        private string $mo_ta_ngan,
        private string|null $mo_ta,
        private float $gia_sp,
        private float $gia_khuyen_mai,
        private string|null $sp_noi_bat,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'danhmuc_id' => $this->danhmuc_id,
            'thuonghieu_id' => $this->thuonghieu_id,
            'nhacungcap_id' => $this->nhacungcap_id,
            'hinh_anh' => $this->hinh_anh,
            'ma_sp' => $this->ma_sp,
            'mo_ta_ngan' => $this->mo_ta_ngan,
            'mo_ta' => $this->mo_ta,
            'gia_sp' => $this->gia_sp,
            'gia_khuyen_mai' => $this->gia_khuyen_mai,
            'sp_noi_bat' => $this->sp_noi_bat,
        ];
    }
}
