<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_dm' => 'required|max:100',
            'thu_tu' => 'numeric',
            'la_noi_bat' => 'numeric'
        ];
    }
}
