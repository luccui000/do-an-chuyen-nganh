<?php

namespace App\Contracts;

interface DiaChiInterface
{
    public function dsTinhThanh(): array;
    public function dsQuanHuyen($maTinhThanh): array;
    public function dsXaPhuong($maQuanHuyen): array;
}
