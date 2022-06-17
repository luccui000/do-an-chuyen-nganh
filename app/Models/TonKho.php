<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TonKho extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sanpham_id',
        'so_luong',
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
