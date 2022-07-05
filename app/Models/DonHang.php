<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    const DANG_CHO_XAC_NHAN = 'Đang chờ xác nhận';
    const DA_XAC_NHAN = 'Đã xác nhận';
    const DA_HOAN_THANH = 'Đã hoàn thành';
    const DA_HUY = 'Đã hủy';
    const THANH_TOAN_KHI_NHAN_HANG = 'Thanh toán khi nhận hàng';
    const THANH_TOAN_ONLINE = 'Thanh toán qua thẻ online';

    protected $table = 'donhangs';

    protected $fillable = [
        'id',
        'ma_don_hang',
        'khachhang_id',
        'ho',
        'ten',
        'magiamgia_id',
        'phi_giao_hang',
        'ma_xa',
        'thanh_tien',
        'tong_tien',
        'dia_chi',
        'phuong_thuc_thanh_toan',
        'ghi_chu',
        'trang_thai'
    ];
    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'khachhang_id');
    }
    public function magiamgia()
    {
        return $this->hasOne(MaGiamGia::class, 'magiamgia_id', 'id');
    }
    public function sanphams()
    {
        return $this->belongsToMany(SanPham::class, 'chitiet_donhangs', 'donhang_id', 'sanpham_id')
            ->withPivot(['so_luong', 'don_gia', 'thanh_tien']);
    }
    public static function danhSachThanhToan()
    {
        return [
            self::THANH_TOAN_KHI_NHAN_HANG,
            self::THANH_TOAN_ONLINE,
        ];
    }
    public static function trangThaiDonHang()
    {
        return [
            self::DANG_CHO_XAC_NHAN,
            self::DA_XAC_NHAN,
            self::DA_HOAN_THANH,
            self::DA_HUY
        ];
    }
}
