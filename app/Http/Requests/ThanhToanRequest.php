<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToanRequest extends FormRequest
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
            'donhang_id' => 'required|exists:donhangs,id',
            'tong_tien' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'donhang_id.required' => 'Vui lòng điền thông tin đơn hàng',
            'donhang_id.exists' => 'Đơn hàng không tồn tại trong hệ thống',
            'tong_tien.required' => 'Thiếu thông tin giá trị đơn hàng',
            'tong_tien.numeric' => 'Giá trị đơn hàng không hợp lệ'
        ];
    }
}
