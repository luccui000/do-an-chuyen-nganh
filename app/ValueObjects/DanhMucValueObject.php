<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class DanhMucValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string $ten_dm,
        private string|null $hinh_anh,
        private string $thu_tu,
        private string|null $la_noi_bat,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ten_dm' => $this->ten_dm,
            'hinh_anh' => $this->hinh_anh,
            'thu_tu' => $this->thu_tu,
            'la_noi_bat' => $this->la_noi_bat,
        ];
    }
}
