<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\DoanhThu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected DoanhThu $doanhThu
    ) { }

    public function thongke()
    {
        return new JsonResponse(
            data: [
                'tuan_truoc' => $this->doanhThu->tuantruoc(),
                'tuan_nay' => $this->doanhThu->tuannay(),
                'thang_truoc' => $this->doanhThu->thangtruoc(),
                'thang_nay' => $this->doanhThu->thangnay(),
                'nam_nay' => $this->doanhThu->namnay(),
            ],status: JsonResponse::HTTP_OK
        );
    }
}
