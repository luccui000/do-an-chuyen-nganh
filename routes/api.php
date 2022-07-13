<?php

use App\Http\Controllers\Api\Admin\BieuDoController;
use App\Http\Controllers\Api\Admin\DangNhapController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\ChiTietDonHangController;
use App\Http\Controllers\Api\DanhMucController;
use App\Http\Controllers\Api\DiaChiController;
use App\Http\Controllers\Api\DoanhThuController;
use App\Http\Controllers\Api\DonHangController;
use App\Http\Controllers\Api\GiaoHangController;
use App\Http\Controllers\Api\HinhAnhController;
use App\Http\Controllers\Api\KhachHangController;
use App\Http\Controllers\Api\NhaCungCapController;
use App\Http\Controllers\Api\PhuongThucThanhToanController;
use App\Http\Controllers\Api\QuyCachController;
use App\Http\Controllers\Api\SanPhamController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ThanhToanController;
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
Route::get('/don-hang/loc-theo', [DonHangController::class, 'loctheo']);


Route::get('/thanh-toan/phuong-thuc-thanh-toan', [PhuongThucThanhToanController::class, '__invoke']);
Route::post('/thanh-toan', [ThanhToanController::class, 'purchase']);
Route::post('/thanh-toan/chuyen-huong', [ThanhToanController::class, 'url']);

Route::get('/khach-hang/{id}/don-hang', [KhachHangController::class, 'donhang']);

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

Route::group(['prefix' => 'thong-ke'], function() {
    Route::get('/', [DashboardController::class, 'thongke']);
    Route::get('/san-pham/tong-so', [SanPhamController::class, 'tongso']);
    Route::get('/san-pham/ban-chay-nhat', [SanPhamController::class, 'banchaynhat']);
    Route::get('/san-pham/xem-nhieu-nhat', [SanPhamController::class, 'xemnhieunhat']);
    Route::controller(DoanhThuController::class)
        ->prefix('/doanh-thu')
        ->group(function () {
            Route::get('/tuan-truoc', 'tuantruoc');
            Route::get('/tuan-nay', 'tuannay');
            Route::get('/thang-truoc', 'thangtruoc');
            Route::get('/thang-nay', 'thangnay');
            Route::get('/nam-truoc', 'namtruoc');
            Route::get('/nam-nay', 'namnay');
        });
    Route::get('/khach-hang/tong-so', [KhachHangController::class, 'tongso']);
    Route::get('/khach-hang/top', [KhachHangController::class, 'top']);
    Route::get('/don-hang/gan-nhat', [DonHangController::class, 'donhanggannhat']);
});

Route::group(['prefix' => 'bieu-do'], function() {
    Route::get('/doanh-thu-tuan', [BieuDoController::class, 'doanhthutuan']);
});
Route::post('/don-hang/cho-xac-nhan', [DonHangController::class, 'choXacNhan']);
Route::post('/don-hang/dang-giao-hang', [DonHangController::class, 'dangGiaoHang']);
Route::post('/don-hang/da-huy', [DonHangController::class, 'huyDonHang']);
Route::post('/don-hang/in-hoa-don', [DonHangController::class, 'inHoaDon']);

Route::apiResource('sliders', SliderController::class);
Route::apiResource('danh-muc', DanhMucController::class);
Route::apiResource('thuong-hieu', ThuongHieuController::class);
Route::apiResource('nha-cung-cap',  NhaCungCapController::class);
Route::apiResource('san-pham',  SanPhamController::class);
Route::apiResource('hinh-anh',  HinhAnhController::class);
Route::apiResource('don-hang', DonHangController::class);
Route::apiResource('chi-tiet-don-hang', ChiTietDonHangController::class);
Route::apiResource('quy-cach', QuyCachController::class);
Route::apiResource('khach-hang', KhachHangController::class);


