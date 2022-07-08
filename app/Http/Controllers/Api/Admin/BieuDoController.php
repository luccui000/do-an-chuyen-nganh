<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\BieuDo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BieuDoController extends Controller
{
    public function __construct(
        protected BieuDo $bieuDo
    ){}

    public function doanhthutuan()
    {
        $dtt = $this->bieuDo->doanhthutuan();

        return new JsonResponse(
            data: $dtt,
            status: JsonResponse::HTTP_OK
        );
    }
}
