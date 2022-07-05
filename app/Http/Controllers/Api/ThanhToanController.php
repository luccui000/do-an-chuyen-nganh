<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ThanhToanGateway;
use App\Factories\VNPayFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThanhToanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    public function __construct(
        protected ThanhToanGateway $thanhToanGateway
    )
    {
    }

    public function url(ThanhToanRequest $request)
    {
        $params = $request->all();
        $url = $this->thanhToanGateway->url(
            VNPayFactory::make($params)->toArray()
        );

        return new JsonResponse(
            data: $url,
            status: JsonResponse::HTTP_OK
        );
    }
    public function purchase(Request $request)
    {
        dd($request);
    }
}
