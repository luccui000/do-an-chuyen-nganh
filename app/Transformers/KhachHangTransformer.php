<?php

namespace App\Transformers;

use App\Models\KhachHang;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class KhachHangTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(KhachHang $khachhang)
    {
        return [
            'ho_ten' => $khachhang->ho_khach_hang . ' ' . $khachhang->ten_khach_hang,
            'so_dien_thoai' => $khachhang->so_dien_thoai,
            'ten_dang_nhap' => $khachhang->ten_dang_nhap,
            'email' => $khachhang->email,
            'dia_chi' => $khachhang->dia_chi,
            'ma_xa' => $khachhang->ma_xa,
            'lan_dang_nhap_cuoi' => $khachhang->lan_dang_nhap_cuoi
        ];
    }
}
