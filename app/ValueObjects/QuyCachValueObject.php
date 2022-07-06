<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class QuyCachValueObject implements ValueObject
{
    public function __construct(
        public string $tenQuyCach,
        public string|null $moTa
    )
    {
    }

    public function toArray(): array
    {
        return [
            'ten_quy_cach' => $this->tenQuyCach,
            'mo_ta' => $this->moTa,
        ];
    }
}
