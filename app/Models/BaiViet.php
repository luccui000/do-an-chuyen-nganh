<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'baiviets';
    const DA_CONG_BO = 'Đã công bố';
    const BAN_THAO = 'Bản thảo';
    const DA_CHO_DANG = 'Đang chờ đăng';
}
