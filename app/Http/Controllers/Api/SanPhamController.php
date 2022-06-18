<?php

namespace App\Http\Controllers\Api;

use App\Factories\SanPhamFactory;
use App\Factories\TonKhoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\SanPham;
use App\Models\TonKho;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            data: SanPham::all(),
            status: JsonResponse::HTTP_OK
        );
    }

    public function store(SanPhamRequest $request)
    {
        $sanpham = SanPhamFactory::make($request->all())
            ->toArray();
        unset($sanpham['id']);
        $tonKho = $request->ton_kho;
        try {
            $sanpham = SanPham::create($sanpham);
            $tonKhoValue = [
                'sanpham_id' => $sanpham->id,
                'so_luong' => $tonKho
            ];
            TonKho::create(
                TonKhoFactory::make($tonKhoValue)
                    ->toArray()
            );
            return new JsonResponse(
                data: $sanpham,
                status: 200
            );
        } catch (\Exception $exception) {
            return new JsonResponse(
                data: $exception->getMessage(),
                status: JsonResponse::HTTP_OK
            );
        }
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
