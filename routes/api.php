<?php

use App\Http\Controllers\Api\Admin\DangNhapController;
use App\Http\Controllers\Api\ChiTietDonHangController;
use App\Http\Controllers\Api\DanhMucController;
use App\Http\Controllers\Api\DiaChiController;
use App\Http\Controllers\Api\DonHangController;
use App\Http\Controllers\Api\GiaoHangController;
use App\Http\Controllers\Api\HinhAnhController;
use App\Http\Controllers\Api\NhaCungCapController;
use App\Http\Controllers\Api\SanPhamController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ThuongHieuController;
use App\Http\Controllers\Api\XacThucController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/testing', function() {
    return "fortesting";
});
Route::get('/san-pham/tat-ca', [SanPhamController::class, 'tatca']);
Route::get('/san-pham/de-xuat', [SanPhamController::class, 'dexuat']);
Route::get('/san-pham/mua-nhieu', [SanPhamController::class, 'muanhieu']);
Route::get('/san-pham/uu-dai', [SanPhamController::class, 'uudai']);

Route::get('/don-hang/tim-kiem', [DonHangController::class, 'timkiem']);

Route::apiResource('sliders', SliderController::class);
Route::apiResource('danh-muc', DanhMucController::class);
Route::apiResource('thuonghieus', ThuongHieuController::class);
Route::apiResource('nha-cung-cap',  NhaCungCapController::class);
Route::apiResource('san-pham',  SanPhamController::class);
Route::apiResource('hinhanhs',  HinhAnhController::class);
Route::apiResource('don-hang', DonHangController::class);
Route::apiResource('chi-tiet-don-hang', ChiTietDonHangController::class);


Route::controller(DiaChiController::class)
    ->prefix('/dia-chi')
    ->group(function () {
    Route::get('/', 'danhsach');
    Route::get('/ds-tinh-thanh', 'dsTinhThanh');
    Route::get('/ds-quan-huyen', 'dsQuanHuyen');
    Route::get('/ds-phuong-xa', 'dsPhuongXa');
});

Route::controller(GiaoHangController::class)->group(function() {
    Route::post('/giao-hang/phi-van-chuyen', 'phiVanChuyen');
});

Route::controller(XacThucController::class)
    ->prefix('/khach-hang')
    ->group(function() {
        Route::post('/dang-ky', 'register');
        Route::post('/dang-nhap', 'login');
        Route::post('/dang-xuat', 'logout');
        Route::post('/thay-doi', 'refresh');
        Route::get('/thong-tin-ca-nhan', 'profile');
});


Route::group(['prefix' => 'admin'], function () {
    Route::controller(DangNhapController::class)
        ->group(function() {
            Route::post('/dang-ky', 'register');
            Route::post('/dang-nhap', 'login');
            Route::get('/tai-khoan', 'profile');
        });
});
