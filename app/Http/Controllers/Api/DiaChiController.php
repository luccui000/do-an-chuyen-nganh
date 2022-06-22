<?php

namespace App\Http\Controllers\Api;

use App\Contracts\DiaChiInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DiaChiController extends Controller
{
    public function __construct(
        private DiaChiInterface $diaChi
    )
    {
    }
    public function danhsach(Request $request)
    {
        if($request->has('ma_tinh')) {
            $response = Cache::rememberForever(md5($request->fullUrl()), function () use ($request) {
                return $this->diaChi->dsQuanHuyen($request->get('ma_tinh'));
            });
            return new JsonResponse(
                data: $response,
                status: JsonResponse::HTTP_OK
            );
        } else if($request->has('ma_huyen')) {
            $response = Cache::rememberForever(md5($request->fullUrl()), function () use ($request) {
                return $this->diaChi->dsXaPhuong($request->get('ma_huyen'));
            });
            return new JsonResponse(
                data: $response,
                status: JsonResponse::HTTP_OK
            );
        } else {
            $response = Cache::rememberForever(md5($request->fullUrl()), function () {
                return $this->diaChi->dsTinhThanh();
            });
            return new JsonResponse(
                data: $response,
                status:  JsonResponse::HTTP_OK
            );
        }
    }

    public function dsTinhThanh()
    {
        return new JsonResponse(
            data: $this->diaChi->dsTinhThanh(),
            status:  JsonResponse::HTTP_OK
        );
    }
    public function dsQuanHuyen(Request $request)
    {
        $maTinhThanh = $request->has('ma_tinh') ? $request->get('ma_tinh') : null;

        if(!is_null($maTinhThanh)) {
            return new JsonResponse(
                data: $this->diaChi->dsQuanHuyen($maTinhThanh),
                status: JsonResponse::HTTP_OK
            );
        } else {
            return new JsonResponse(
                data: null,
                status:  JsonResponse::HTTP_NO_CONTENT
            );
        }
    }
    public function dsPhuongXa(Request $request)
    {
        $maQuanHuyen = $request->has('ma_huyen') ? $request->get('ma_huyen') : null;

        if(!is_null($maQuanHuyen)) {
            return new JsonResponse(
                data: $this->diaChi->dsXaPhuong($maQuanHuyen),
                status: JsonResponse::HTTP_OK
            );
        } else {
            return new JsonResponse(
                data: null,
                status:  JsonResponse::HTTP_NO_CONTENT
            );
        }
    }
}
