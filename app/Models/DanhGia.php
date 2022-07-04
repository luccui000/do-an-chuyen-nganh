<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danhgias';

    protected $fillable = [
        'id',
        'sanpham_id',
        'khachhang_id',
        'noi_dung',
        'so_sao',
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}
