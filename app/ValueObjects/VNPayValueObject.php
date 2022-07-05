<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;

class VNPayValueObject implements ValueObject
{
    public function __construct(
        protected string $TxnRef,
        protected string $OrderInfo,
        protected string $OrderType,
        protected int  $Amount,
        protected string $Locale,
        protected string|null $IpAddr,
    )
    {
        $this->IpAddr = $_SERVER['REMOTE_ADDR'];
    }

    public function toArray(): array
    {
        return [
            'vnp_TxnRef' => $this->TxnRef,
            'vnp_OrderInfo' => $this->OrderInfo,
            'vnp_OrderType' => $this->OrderType,
            'vnp_Amount' => $this->Amount,
            'vnp_Locale' => $this->Locale,
            'vnp_IpAddr' => $this->IpAddr,
        ];
    }
}
