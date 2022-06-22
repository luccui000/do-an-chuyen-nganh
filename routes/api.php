<?php

use App\Http\Controllers\Api\DanhMucController;
use App\Http\Controllers\Api\DiaChiController;
use App\Http\Controllers\Api\GiaoHangController;
use App\Http\Controllers\Api\HinhAnhController;
use App\Http\Controllers\Api\NhaCungCapController;
use App\Http\Controllers\Api\SanPhamController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ThuongHieuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('sliders', SliderController::class);
Route::apiResource('danhmucs', DanhMucController::class);
Route::apiResource('thuonghieus', ThuongHieuController::class);
Route::apiResource('nhacungcaps',  NhaCungCapController::class);
Route::apiResource('sanphams',  SanPhamController::class);
Route::apiResource('hinhanhs',  HinhAnhController::class);

Route::controller(DiaChiController::class)->group(function () {
    Route::get('/dia-chi', 'danhsach');
    Route::get('/dia-chi/ds-tinh-thanh', 'dsTinhThanh');
    Route::get('/dia-chi/ds-quan-huyen', 'dsQuanHuyen');
    Route::get('/dia-chi/ds-phuong-xa', 'dsPhuongXa');
});

Route::controller(GiaoHangController::class)->group(function() {
    Route::post('/giao-hang/phi-van-chuyen', 'phiVanChuyen');
});
