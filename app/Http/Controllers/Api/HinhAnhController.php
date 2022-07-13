<?php

namespace App\Http\Controllers\Api;

use App\Factories\HinhAnhFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\HinhAnhRequest;
use App\Models\HinhAnh;
use App\Transformers\HinhAnhTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HinhAnhController extends Controller
{
    public function index()
    {
        $hinhanhs = HinhAnh::orderBy('created_at', 'desc')->get();

        return fractal($hinhanhs, new HinhAnhTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
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
            'duong_dan' => "/uploads/" . $input['duong_dan']
        ];
        try {
            $hinhanh = HinhAnh::create(
                HinhAnhFactory::make($hinhanhValue)
                    ->toArray()
						);

            return fractal($hinhanh, new HinhAnhTransformer())
                ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);

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
        HinhAnh::destroy($id);
        return new JsonResponse(
            data: 'OK'
        );
    }
}
