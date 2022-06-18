<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmucs';

    protected $fillable = [
        'id',
        'ten_dm',
        'hinh_anh',
        'thu_tu',
        'la_noi_bat'
    ];
}
