<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_ncc' => 'required|max:50',
            'ho_ten_lien_he' => 'required|max:50',
            'email' => 'required|max:50',
            'dia_chi' => 'max:100',
            'dien_thoai' => 'max:11'
        ];
    }
}
