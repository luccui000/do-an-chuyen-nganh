<?php

namespace App\Http\Controllers\Api;

use App\Factories\NhaCungCapFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\NhaCungCapRequest;
use App\Models\NhaCungCap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            data: NhaCungCap::all(),
            status: 200
        );
    }
    public function store(NhaCungCapRequest $request)
    {
        $nhacungcap = NhaCungCapFactory::make(
            $request->all()
        )->toArray();
        $lastId =NhaCungCap::insertGetId($nhacungcap);

        return new JsonResponse(
            data: NhaCungCap::findOrFail($lastId),
            status: 201
        );
    }
    public function show($id)
    {
        $nhacungcap = NhaCungCap::findOrFail($id);
        return new JsonResponse(
            data: $nhacungcap,
            status: 200
        );
    }

    public function update(Request $request, $id)
    {
        $formData = NhaCungCapFactory::make(
            $request->all()
        )->toArray();
        unset($formData['id']);
        unset($formData['created_at']);

        $nhacungcap = NhaCungCap::findOrFail($id);
        $nhacungcap->update($formData);
        $nhacungcap->save();

        return new JsonResponse(
            data: $nhacungcap,
            status: 200
        );
    }
    public function destroy($id)
    {
        $nhacungcap = NhaCungCap::findOrFail($id);
        $nhacungcap->delete();

        return new JsonResponse(
            data: "Xóa thành công",
            status: 200
        );
    }
}
