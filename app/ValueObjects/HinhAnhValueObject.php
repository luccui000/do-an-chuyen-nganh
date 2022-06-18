<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class HinhAnhValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string $duong_dan
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'duong_dan' => $this->duong_dan
        ];
    }
}
