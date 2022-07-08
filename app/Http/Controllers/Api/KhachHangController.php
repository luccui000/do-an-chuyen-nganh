<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Transformers\DonHangTransformer;
use App\Transformers\KhachHangTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {

    }
    public function tongso()
    {
        $kh = KhachHang::count();

        return new JsonResponse(
            data: intval($kh),
            status: JsonResponse::HTTP_OK
        );
    }
    public function top()
    {
        $khachhangIds = DonHang::select('khachhang_id')
            ->orderBy('tong_tien')
            ->limit(5)
            ->get();
        $khachhangIds = $khachhangIds->map(fn($item) => $item['khachhang_id']);

        $khachhangs = KhachHang::whereIn('id', $khachhangIds)->get();

        return fractal($khachhangs, new KhachHangTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    public function donhang(Request $request, $id)
    {
        $donhangs = DonHang::where('khachhang_id', '=', $id)
            ->with([
                'sanphams',
            ])->get();
        return fractal($donhangs, new DonHangTransformer());
    }
    public function store()
    {

    }
    public function show()
    {

    }

    public function update()
    {

    }
    public function destroy()
    {

    }
}
