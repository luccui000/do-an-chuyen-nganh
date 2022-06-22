<?php

namespace App\Http\Controllers\Api;

use App\Contracts\GiaoHangInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiaoHangRequest;
use Illuminate\Http\JsonResponse;

class GiaoHangController extends Controller
{
    public function __construct(private GiaoHangInterface $giaoHang)
    {
    }

    public function phiVanChuyen(GiaoHangRequest $request)
    {
        $maTinhThanh = $request->ma_tinh_thanh; // 214
        $maQuanHuyen = $request->ma_quan_huyen; // 2103
        $maPhuongXa = $request->ma_phuong_xa; // 580807

        $data = $this->giaoHang->phiVanChuyen($maPhuongXa, $maQuanHuyen, $maTinhThanh);

        return new JsonResponse(
            data: $data,
            status: JsonResponse::HTTP_OK
        );
    }
}
