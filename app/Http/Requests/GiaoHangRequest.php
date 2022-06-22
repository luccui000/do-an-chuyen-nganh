<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiaoHangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ma_tinh_thanh' => 'required',
            'ma_quan_huyen' => 'required',
            'ma_phuong_xa' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ma_tinh_thanh.required' => 'Vui lòng chọn mã tỉnh/thành',
            'ma_quan_huyen.required' => 'Vui lòng chọn mã quận/huyện',
            'ma_phuong_xa.required' => 'Vui lòng chọn mã phường/xã',
        ];
    }
}
