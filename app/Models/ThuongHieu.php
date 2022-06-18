<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    use HasFactory;
    protected $table = 'thuonghieus';

    protected $fillable = [
        'id',
        'ten_thuong_hieu',
    ];
    public $timestamps = true;
}
