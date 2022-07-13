<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Services\DoanhThu;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoanhThuController extends Controller
{
    public function __construct(
        protected DoanhThu $doanhThu
    ) {
    }

    public function tuantruoc()
    {
        return new JsonResponse(
            data: intval($this->doanhThu->tuantruoc()),
            status: JsonResponse::HTTP_OK
        );
    }
    public function tuannay()
    {
        return new JsonResponse(
            data: intval($this->doanhThu->tuannay()),
            status: JsonResponse::HTTP_OK
        );
    }
    public function thangtruoc()
    {

        return new JsonResponse(
            data: intval($this->doanhThu->thangtruoc()),
            status: JsonResponse::HTTP_OK
        );
    }
    public function thangnay()
    {
        return new JsonResponse(
            data: intval($this->doanhThu->thangnay()),
            status: JsonResponse::HTTP_OK
        );
    }
    public function namnay()
    {
        return new JsonResponse(
            data: intval($this->doanhThu->namnay()),
            status: JsonResponse::HTTP_OK
        );
    }
    public function namtruoc()
    {
        return new JsonResponse(
            data: intval($this->doanhThu->namtruoc()),
            status: JsonResponse::HTTP_OK
        );
    }
}
