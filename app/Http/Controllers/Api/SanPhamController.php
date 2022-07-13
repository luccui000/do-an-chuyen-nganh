<?php

namespace App\Http\Controllers\Api;

use App\Factories\SanPhamFactory;
use App\Factories\TonKhoFactory;
use App\Filters\SanPhamFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use App\Models\TonKho;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
	public function tatca(SanPhamFilter $filter)
	{
		$sanphams = SanPham::with([
            'danhmuc',
            'nhacungcap',
            'quycach',
            'tonkhos'
		])->filter($filter)->get();

		return new JsonResponse(
			data: $sanphams,
			status: JsonResponse::HTTP_OK
		);
	}
    public function index(SanPhamFilter $filter)
    {
        $sanphams = SanPham::danhsach($filter)
            ->paginate(8)
            ->withQueryString();

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
    public function tongso()
    {
        $ts = SanPham::count();

        return new JsonResponse(
            data: $ts,
            status: JsonResponse::HTTP_OK
        );
    }
    public function banchaynhat()
    {
        $sanphamIds = ChiTietDonHang::select([
                'sanpham_id',
                DB::raw("count(sanpham_id) as sanpham_count")
            ])
            ->groupBy(['sanpham_id'])
            ->orderByDesc('sanpham_count')
            ->get();
        $sanphamIds = $sanphamIds->map(fn($item) => $item->sanpham_id);
        $sanphams = SanPham::whereIn('id', $sanphamIds)->get();

        return new JsonResponse(
            data: $sanphams,
            status: JsonResponse::HTTP_OK
        );
    }
    public function xemnhieunhat()
    {
        $sanphams = SanPham::with([
            'soluongtruycaps'
        ])->get();

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
        $sanpham = SanPham::where($field, '=', $id)
            ->with([
                'danhmuc',
                'thuonghieu',
                'nhacungcap',
                'quycach',
                'tonkhos',
            ])
            ->withCount('danhgias')
            ->withAvg('danhgias', 'so_sao')
            ->firstOrFail();

        return new JsonResponse(
            data: $sanpham,
            status: JsonResponse::HTTP_OK
        );
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $sanpham = SanPham::findOrFail($id);
        unset($data['id']);
        unset($data['tonkhos']);

        $sanpham->update($data);

        return new JsonResponse($sanpham);
    }

    public function destroy($id)
    {
        //
    }
}
