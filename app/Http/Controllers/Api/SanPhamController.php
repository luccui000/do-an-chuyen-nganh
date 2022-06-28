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
        $sanphams = SanPham::danhsach();

        return new JsonResponse(
            data: $sanphams,
            status: JsonResponse::HTTP_OK
        );
    }
    public function dexuat()
    {
        $sanphams = SanPham::with([
            'danhmuc',
            'nhacungcap',
            'quycach',
            'tonkhos',
        ])->limit(4)->get();

        return new JsonResponse(
            data: $sanphams,
            status: JsonResponse::HTTP_OK
        );
    }
    public function muanhieu()
    {
        $sanphams = SanPham::with([
            'danhmuc',
            'nhacungcap',
            'quycach',
            'tonkhos',
        ])->orderBy('sp_noi_bat', 'desc')
            ->limit(12)
            ->get();

        return new JsonResponse(
            data: $sanphams,
            status: JsonResponse::HTTP_OK
        );
    }
    public function uudai()
    {
        $sanphams = SanPham::with([
            'danhmuc',
            'nhacungcap',
            'quycach',
            'tonkhos',
        ])->orderBy('sp_noi_bat', 'desc')
            ->limit(6)
            ->get();

        return new JsonResponse(
            data: $sanphams,
            status: JsonResponse::HTTP_OK
        );
    }
    public function store(SanPhamRequest $request)
    {
        $sanpham = SanPhamFactory::make($request->all())
            ->toArray();
        if(isset($sanpham['id']))
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
        if(is_numeric($id)) {
            $field = 'id';
        } else {
            $field = 'slug';
        }
        $sanpham = SanPham::with([
            'danhmuc',
            'thuonghieu',
            'nhacungcap',
            'quycach',
            'tonkhos',
        ])->where($field, '=', $id)
            ->firstOrFail();

        return new JsonResponse(
            data: $sanpham,
            status: JsonResponse::HTTP_OK
        );
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
