<?php

namespace App\Http\Controllers\Api;

use App\Factories\ThuongHieuFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThuongHieuRequest;
use App\Models\ThuongHieu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThuongHieuController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            data: ThuongHieu::all(),
            status: 200
        );
    }
    public function store(ThuongHieuRequest $request)
    {
        $thuonghieu = ThuongHieuFactory::make(
            $request->all()
        )->toArray();
        $lastId = ThuongHieu::insertGetId($thuonghieu);

        return new JsonResponse(
            data: ThuongHieu::findOrFail($lastId),
            status: 201
        );
    }

    public function show($id)
    {
        return new JsonResponse(
            data: ThuongHieu::findOrFail($id),
            status: 200
        );
    }

    public function update(Request $request, $id)
    {
        $thuonghieu = ThuongHieu::findOrFail($id);
        $thuonghieu->update(
            ThuongHieuFactory::make(
                $request->all()
            )->toArray()
        );
        $thuonghieu->save();

        return new JsonResponse(
            data: $thuonghieu,
            status: 200
        );
    }

    public function destroy($id)
    {
        //
    }
}
