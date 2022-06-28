<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanphams';

    protected $fillable = [
        'id',
        'ten_sp',
        'slug',
        'danhmuc_id',
        'thuonghieu_id',
        'nhacungcap_id',
        'quycach_id',
        'hinh_anh',
        'ma_sp',
        'mo_ta_ngan',
        'mo_ta',
        'gia_sp',
        'gia_khuyen_mai',
        'sp_noi_bat',
    ];
    public $timestamps = true;

    public function hinhAnh(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => url($value)
        );
    }
    public static function danhsach()
    {
        return static::with([
            'danhmuc',
            'thuonghieu',
            'nhacungcap',
            'quycach',
            'tonkhos',
        ])->orderBy('created_at', 'desc')
            ->get();
    }
    public function nhacungcap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
    public function thuonghieu()
    {
        return $this->belongsTo(ThuongHieu::class);
    }
    public function quycach()
    {
        return $this->belongsTo(QuyCach::class);
    }
    public function tonkhos()
    {
        return $this->hasMany(TonKho::class, 'sanpham_id', 'id')
            ->orderBy('created_at', 'desc');
    }
    public function donhang()
    {
        return $this->belongsToMany(DonHang::class, 'chitiet_donhangs', 'sanpham_id', 'donhang_id');
    }
}
