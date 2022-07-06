<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoLuongTruyCap extends Model
{
    use HasFactory;

    protected $table = 'soluongtruycaps';

    protected $fillable = [
        'id',
        'so_luong',
        'soluongtruycapable_id',
        'soluongtruycapable_type',
    ];
    public function soluongtruycapable()
    {
        return $this->morphTo();
    }
}
