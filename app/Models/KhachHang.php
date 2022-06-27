<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class KhachHang extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded = 'khachhangs';
    protected $table = 'khachhangs';

    protected $fillable = [
        'id',
        'ho_khach_hang',
        'ten_khach_hang',
        'so_dien_thoai',
        'ten_dang_nhap',
        'email',
        'password',
        'dia_chi',
        'ma_xa',
        'lan_dang_nhap_cuoi',
        'ngay_xac_thuc_emai',
        'remember_token',
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'ngay_xac_thuc_emai',
        'lan_dang_nhap_cuoi'
    ];
    public function donhangs()
    {
        return $this->hasMany(DonHang::class, 'khachhang_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
