<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PhuongThucThanhToanController extends Controller
{
    public function __invoke()
    {
        return new JsonResponse(
            data: DonHang::danhSachThanhToan(),
            status: JsonResponse::HTTP_OK
        );
    }
}
