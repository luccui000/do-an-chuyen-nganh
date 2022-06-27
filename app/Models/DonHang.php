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
        'magiamgia_id',
        'phi_giao_hang',
        'thanh_tien',
        'tong_tien',
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
    public function sanpham()
    {
        return $this->belongsToMany(SanPham::class, 'chitiet_sanpham', 'donhang_id', 'sanpham_id');
    }
}
