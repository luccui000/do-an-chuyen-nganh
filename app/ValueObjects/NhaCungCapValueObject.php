<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class NhaCungCapValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string $ten_ncc,
        private string $ho_ten_lien_he,
        private string $email,
        private string|null $dia_chi,
        private string|null $dien_thoai
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ten_ncc' => $this->ten_ncc,
            'ho_ten_lien_he' => $this->ho_ten_lien_he,
            'email' => $this->email,
            'dia_chi' => $this->dia_chi,
            'dien_thoai' => $this->dien_thoai,
        ];
    }
}
