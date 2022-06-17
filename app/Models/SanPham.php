<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'danhmuc_id',
        'thuonghieu_id',
        'nhacungcap_id',
        'hinh_anh',
        'ma_sp',
        'mo_ta_ngan',
        'mo_ta',
        'gia_sp',
        'gia_khuyen_mai',
        'sp_noi_bat',
    ];
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
    public function tonkhos()
    {
        return $this->hasMany(TonKho::class);
    }
}
