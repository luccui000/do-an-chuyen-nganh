<?php

namespace App\Services;

use App\Contracts\ThanhToanGateway;

class VNPay implements ThanhToanGateway
{
    public function __construct(
        protected array $config
    ) {
    }

    public function url(array $params)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = $this->config['callback'];
        $vnp_TmnCode = $this->config['code'];
        $vnp_HashSecret = $this->config['hash'];

        $vnp_TxnRef         = $params['vnp_TxnRef'];
        $vnp_OrderInfo      = $params['vnp_OrderInfo'];
        $vnp_OrderType      = $params['vnp_OrderType'];
        $vnp_Amount         = $params['vnp_Amount'] * 100;
        $vnp_Locale         = $params['vnp_Locale'];
        $vnp_IpAddr         = $params['vnp_IpAddr'];

        $inputData = array(
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_Version" => "2.1.0",
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
    }
    public function thanhtoan($giatri)
    {
        return $giatri;
    }
}
