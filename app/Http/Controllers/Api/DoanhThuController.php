<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoanhThuController extends Controller
{
    public function tuannay()
    {
        $now = Carbon::now();
        $startOfWeek = $now->subDays($now->dayOfWeek);
        $dt = DonHang::where('created_at', '>=', $startOfWeek)
            ->sum('tong_tien');

        return new JsonResponse(
            data: intval($dt),
            status: JsonResponse::HTTP_OK
        );
    }
    public function thangnay()
    {
        $currMonth = Carbon::now()->month;
        $doanhthu = DonHang::whereMonth('created_at', '=', $currMonth)
            ->sum('tong_tien');
        return new JsonResponse(
            data: intval($doanhthu),
            status: JsonResponse::HTTP_OK
        );
    }
    public function namnay()
    {
        $currYear = Carbon::now()->year;
        $doanhthu = DonHang::whereYear('created_at', '=', $currYear)
            ->sum('tong_tien');
        return new JsonResponse(
            data: intval($doanhthu),
            status: JsonResponse::HTTP_OK
        );
    }
}
