<?php

namespace App\Factories;

use App\Contracts\Factory;
use App\Contracts\ValueObject;
use App\ValueObjects\VNPayValueObject;

class VNPayFactory implements Factory
{
    public static function make(array $attributes): ValueObject
    {
        return new VNPayValueObject(
            TxnRef: data_get($attributes, 'donhang_id'),
            OrderInfo: 'Thanh toan hoa don hang hoa, so tien: ' . data_get($attributes, 'tong_tien'),
            OrderType: array_key_exists('loai_thanh_toan', $attributes) ?
                $attributes['loai_thanh_toan'] : 'Thanh toán hóa đơn',
            Amount: data_get($attributes, 'tong_tien'),
            Locale: 'vn',
            IpAddr: null
        );
    }
}
