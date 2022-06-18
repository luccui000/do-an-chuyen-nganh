<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
    protected $table = 'hinhanhs';

    protected $fillable = [
        'id',
        'duong_dan'
    ];
}
