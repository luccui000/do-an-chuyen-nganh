<?php

namespace App\Transformers;

use App\Models\DonHang;
use League\Fractal\TransformerAbstract;

class DonHangTransformer extends TransformerAbstract
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
    public function transform(DonHang $donhang)
    {
        return [
            'ma_don_hang' => $donhang->ma_don_hang,
            'khachhang_id' => intval($donhang->khachhang_id),
            'khachhang_ho_ten' => $donhang->khachhang->ho_khach_hang . ' ' . $donhang->khachhang->ten_khach_hang,
            'khachhang_email' => $donhang->khachhang->email,
            'magiamgia_id' => intval($donhang->magiamgia_id),
            'phi_giao_hang' => intval($donhang->phi_giao_hang),
            'ma_xa' => $donhang->ma_xa,
            'thanh_tien' => intval($donhang->thanh_tien),
            'tong_tien' => intval($donhang->tong_tien),
            'dia_chi' => $donhang->dia_chi,
            'phuong_thuc_thanh_toan' => $donhang->phuong_thuc_thanh_toan,
            'ghi_chu' => $donhang->ghi_chu,
            'trang_thai' => $donhang->trang_thai,
            'sanpham_so_luong' => $donhang->sanphams->count(),
            'sanphams' => $donhang->sanphams
        ];
    }
}
