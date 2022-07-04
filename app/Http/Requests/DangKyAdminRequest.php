<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyAdminRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập vào tên của bạn',
            'email.required' => 'Vui lòng nhập vào địa chỉ email',
            'email.unique' => 'Email đã được đăng ký',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.max' => 'Địa chỉ email quá dài',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.max' => 'Mật khẩu quá dài',
        ];
    }
}
