<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyCach extends Model
{
    use HasFactory;

    protected $table = 'quycachs';

    protected $fillable = [
        'id',
        'ten_quy_cach',
        'mo_ta',
    ];

}
