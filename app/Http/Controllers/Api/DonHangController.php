<?php

namespace App\Http\Controllers\Api;

use App\Factories\DonHangFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonHangRequest;
use App\Models\DonHang;
use App\Transformers\DonHangTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        $donhangs = DonHang::with([
            'khachhang',
            'sanphams',
        ])->get();

        return fractal($donhangs, new DonHangTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    public function loctheo(Request $request)
    {
        $q = $request->query('trang_thai');
        $trangThai = match ($q) {
            0 => DonHang::DA_HUY,
            1 => DonHang::DANG_CHO_XAC_NHAN,
            2 => DonHang::DA_XAC_NHAN,
            3 => DonHang::DA_HOAN_THANH,
            default => '',
        };

        $donhangs = DonHang::where('trang_thai', '=', $trangThai)->get();

        return fractal($donhangs, new DonHangTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    public function store(DonHangRequest $request)
    {
        $donhang = DonHang::create(
            DonHangFactory::make($request->all())
                ->toArray()
        );
        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function show($id)
    {
        $donhang = DonHang::where('id', '=', $id)
            ->orWhere('ma_don_hang', '=', $id)
            ->with(['khachhang', 'sanphams'])
            ->firstOrFail();
        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function timkiem(Request $request)
		{
			if($request->has('ma')) {
				$q = $request->get('ma');
        $donhang = DonHang::where('ma_don_hang', '=', $q)
            ->orWhereHas('khachhang', function($query) use ($q) {
                    $query->where('email', '=', $q);
            })
            ->with(['sanphams'])
            ->get();

        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
			} else {
				return new JsonResponse(
						data: [],
						status: JsonResponse::HTTP_OK
				);
			}
    }
    public function update(DonHangRequest $request, $id)
    {
//        $rules = (new DonHangRequest())->rules();
//        $validator = Validator::make($request->all(), $rules);
        $donhang = DonHang::findOrFail($id);


        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function destroy()
    {}

}
