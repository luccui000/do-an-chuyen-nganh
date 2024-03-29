<?php

namespace App\Http\Controllers\Api;

use App\Factories\HinhAnhFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\HinhAnhRequest;
use App\Models\HinhAnh;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HinhAnhController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            data: HinhAnh::all(),
            status: JsonResponse::HTTP_OK
        );
    }

    public function store(HinhAnhRequest $request)
    {
        $hinhAnh = $request->file('hinh_anh');
        $ext = $hinhAnh->getClientOriginalExtension();
        $fileName = time() . '_' . md5($hinhAnh->getFilename());
        $input['duong_dan'] = $fileName . '.' . $ext;
        $destinationPath = public_path('/uploads');
        $hinhAnh->move($destinationPath, $input['duong_dan']);

        $hinhanhValue = [
            'duong_dan' => "/public/uploads/" . $input['duong_dan']
        ];
        try {
            $hinhanh = HinhAnh::create(
                HinhAnhFactory::make($hinhanhValue)
                    ->toArray()
            );
            return new JsonResponse(
                data: $hinhanh,
                status: JsonResponse::HTTP_OK
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
