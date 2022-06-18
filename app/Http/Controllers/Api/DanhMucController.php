<?php

namespace App\Http\Controllers\Api;

use App\Factories\DanhMucFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            data: DanhMuc::all(),
            status: 200
        );
    }

    public function store(DanhMucRequest $request)
    {
        $danhmuc = DanhMucFactory::make(
            $request->all()
        )->toArray();
        $lastId = DanhMuc::insertGetId($danhmuc);

        return new JsonResponse(
            data: DanhMuc::findOrFail($lastId),
            status: 201
        );
    }

    public function show($id)
    {
        return new JsonResponse(
            data: DanhMuc::findOrFail($id),
            status: 200
        );
    }

    public function update(Request $request, $id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        $danhmuc->update(
            DanhMucFactory::make(
                $request->all()
            )->toArray()
        );
        $danhmuc->save();

        return new JsonResponse(
            data: $danhmuc,
            status: 200
        );
    }

    public function destroy($id)
    {
        //
    }
}
