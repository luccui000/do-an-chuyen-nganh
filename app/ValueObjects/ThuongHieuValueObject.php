<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class ThuongHieuValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string $ten_thuong_hieu
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ten_thuong_hieu' => $this->ten_thuong_hieu
        ];
    }
}
