<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chitiet_donhangs';

    protected $fillable = [
        'id',
        'donhang_id',
        'sanpham_id',
        'so_luong',
        'don_gia',
        'thanh_tien',
    ];
}
