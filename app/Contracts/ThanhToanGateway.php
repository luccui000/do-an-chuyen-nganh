<?php

namespace App\Contracts;

interface ThanhToanGateway
{
    public function url(array $params);
    public function thanhtoan($giatri);
}
