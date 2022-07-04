<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiTietDonHangRequest extends FormRequest
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
            'sanpham_id' => 'required|exists:sanphams,id',
            'so_luong' => 'required|numeric|gt:0',
            'don_gia' => 'required|numeric|gt:0',
            'thanh_tien' => 'required|numeric|gt:0',
        ];
    }
    public function messages()
    {
        return [
            'donhang_id.required' => 'Vui lòng chọn đúng thông tin đơn hàng',
            'donhang_id.exists' => 'Đơn hàng không tồn tại trong hệ thống',
            'sanpham_id.required' => 'Vui lòng chọn đúng thông tin sản phẩm',
            'sanpham_id.exists' => 'Sản phẩm không tồn tại trong hệ thống',
            'so_luong.required' => 'Vui lòng nhập số lượng',
            'so_luong.numeric' => 'Số lượng sản phẩm không hợp lệ',
            'so_luong.gt' => 'Vui lòng nhập số lượng lớn hơn 0',
            'don_gia.required' => 'Thiếu thông tin đơn giá',
            'don_gia.numeric' => 'Thông tin đơn giá không hợp lệ',
            'don_gia.gt' => 'Đơn giá phải lớn hơn 0',
            'thanh_tien.required' => 'Thiếu thông tin thành tiền',
            'thanh_tien.numeric' => 'Thành tiền không hợp lệ',
            'thanh_tien.gt' => 'Thành tiền phải lớn hơn 0'
        ];
    }
}
