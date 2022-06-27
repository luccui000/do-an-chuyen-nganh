<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    use HasFactory;
    const GIAM_THEO_PHAN_TRAM = 'Phần trăm';
    const GIAM_THEO_SO_TIEN = 'Số tiền';
    protected $table = 'magiamgias';

    protected $fillable = [
        'id',
        'ma_giam_gia',
        'giam_theo',
        'ngay_bat_dat',
        'ngay_ket_thu',
    ];
}
