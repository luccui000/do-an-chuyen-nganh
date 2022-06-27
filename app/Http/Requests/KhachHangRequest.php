<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangRequest extends FormRequest
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
            'ho_khach_hang' => 'required|max:30',
            'ten_khach_hang' => 'required|max:30',
            'so_dien_thoai' => 'required|exists:khachhangs,so_dien_thoai|min:10|max:11',
            'ten_dang_nhap' => 'required|exists:khachhangs,ten_dang_nhap|max:30',
            'email' => 'email|max:50',
            'password' => 'required|max:50'
        ];
    }
    public function messages()
    {
        return [
            'ho_khach_hang.required' => 'Vui lòng nhập họ của bạn',
            'ho_khach_hang.max' => 'Họ của bạn quá dài, vui lòng chỉ nhập dưới :max ký tự',
            'ten_khach_hang.required' => 'Vui lòng nhập tên của bạn',
            'ten_khach_hang.max' => 'Tên của bạn quá dài, vui lòng chỉ nhập dưới :max ký tự',
            'so_dien_thoai.required' => 'Vui lòng nhập vào số điện thoại',
            'so_dien_thoai.min' => 'Số điện thoại quá ngắn',
            'so_dien_thoai.exists' => 'Số điện thoại đã được đăng ký',
            'so_dien_thoai.max' => 'Số điện thoại quá dài',
            'ten_dang_nhap.required' => 'Vui lòng nhập tên đăng nhập',
            'ten_dang_nhap.max' => 'Tên đăng nhập quá dài',
            'ten_dang_nhap.exists' => 'Tên đăng nhập đã được đăng ký',
            'email.max' => 'Email quá dài, vui lòng chỉ nhập dưới 50 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.max' => 'Mật khẩu quá dài',
        ];
    }
}
