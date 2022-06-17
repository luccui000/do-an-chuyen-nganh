<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class TonKhoValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private int $sanpham_id,
        private int $so_luong
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'sanpham_id' => $this->sanpham_id,
            'so_luong' => $this->so_luong,
        ];
    }
}
