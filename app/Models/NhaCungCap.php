<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ten_ncc',
        'ho_ten_lien_he',
        'email',
        'dia_chi',
        'dien_thoai'
    ];
}
