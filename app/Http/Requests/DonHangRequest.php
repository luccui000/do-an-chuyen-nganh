<?php

namespace App\Http\Requests;

use App\Models\DonHang;
use Illuminate\Foundation\Http\FormRequest;

class DonHangRequest extends FormRequest
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
            'khachhang_id' => 'required|exists:khachhangs,id',
            'ma_xa' => 'required',
            'phi_giao_hang' => 'required|numeric|gt:-1',
            'thanh_tien' => 'required|numeric|gt:-1',
            'tong_tien' => 'required|numeric|gt:-1',
            'phuong_thuc_thanh_toan' => 'required|in:0,1',
            'trang_thai' => 'in:0,1,2,3'
        ];
    }
    public function messages()
    {
        return [
            'khachhang_id.required' => 'Vui lòng chọn khách hàng thanh toán đơn hàng',
            'khachhang_id.exists' => 'Mã khách hàng không tồn tại trong hệ thống',
            'ma_xa.required' => 'Vui lòng chọn thông tin địa chỉ',
            'phi_giao_hang.required' => 'Thông tin giao hàng không đúng',
            'phi_giao_hang.numeric' => 'Thông tin giao hàng không đúng',
            'phi_giao_hang.gt' => 'Phí giao hàng phải lơn hơn 0',
            'thanh_tien.required' => 'Thiếu thông tin thành tiền',
            'thanh_tien.numeric' => 'Thành tiền không hợp lệ',
            'thanh_tien.gt' => 'Thành tiền phải lớn hơn 0',
            'tong_tien.required' => 'Thiếu thông tin tổng tiền đơn hàng',
            'tong_tien.min' => 'Tổng tiền ít nhất là 0',
            'tong_tien.numeric' => 'Tổng tiền không hợp lệ',
            'tong_tien.gt' => 'Tổng tiền phải lớn hơn 0',
            'phuong_thuc_thanh_toan.required' => 'Vui lòng chọn phương thức thanh toán',
            'phuong_thuc_thanh_toan.in' => 'Phương thức thanh toán không hợp lệ',
            'trang_thai.in' => 'Trạng thái đơn hàng không hợp lệ'
        ];
    }
}
