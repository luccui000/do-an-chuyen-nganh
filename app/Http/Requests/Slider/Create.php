<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'background_image' => 'required|max:200',
            'primary_text' => 'required|max:100',
            'secondary_text' => 'required|max:100',
            'description' => 'max:200'
        ];
    }
    public function messages()
    {
        return [
            'background_image.required' => 'Vui lòng thêm ảnh bìa',
            'background_image.max' => 'Độ dài của đường link ảnh quá 200 ký tự',
            'primary_text.required' => 'Vui lòng thêm tiêu đề cho slider',
            'primary_text.max' => 'Độ dài của tiêu đề quá 100 ký tự',
            'secondary_text.required' => 'Vui lòng thêm mô tả ngắn cho slider',
            'secondary_text.max' => 'Độ dài của mô tả quá 100 ký tự',
            'description.max' => 'Độ dài của mô tả vượt quá',
        ];
    }
    public function expectsJson()
    {
    }
}
