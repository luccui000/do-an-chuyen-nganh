<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HinhAnhRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096'
        ];
    }
    public function messages()
    {
        return [
            'hinh_anh.required' => 'Vui lòng chọn hình ảnh',
            'hinh_anh.image' => 'Hình ảnh không đúng định dạng',
            'hinh_anh.mimes' => 'Vui lòng chọn ảnh với các định dạng sau: jpeg,png,jpg,gif',
            'hinh_anh|max' => 'Kích thước hình ảnh quá lớn'
        ];
    }
}
