<?php

namespace App\Http\Controllers\Api;

use App\Factories\DonHangFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonHangRequest;
use App\Models\DonHang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        $donhangs = DonHang::with([
            'sanphams'
        ])->get();
        return new JsonResponse(
            data: $donhangs,
            status: JsonResponse::HTTP_OK
        );
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
