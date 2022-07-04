<?php

namespace App\Http\Controllers\Api;

use App\Factories\ChiTietDonHangFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChiTietDonHangRequest;
use App\Models\ChiTietDonHang;
use Illuminate\Http\JsonResponse;

class ChiTietDonHangController extends Controller
{
    public function index()
    {

    }
    public function store(ChiTietDonHangRequest $request)
    {
        $chitietdonhang = ChiTietDonHang::create(
            ChiTietDonHangFactory::make($request->all())->toArray()
        );
        return new JsonResponse(
            data: $chitietdonhang,
            status: JsonResponse::HTTP_OK
        );
    }
}
