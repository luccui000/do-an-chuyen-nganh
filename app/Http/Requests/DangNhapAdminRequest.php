<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapAdminRequest extends FormRequest
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
            'email' => 'required|email|max:50',
            'password' => 'required|max:50'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập vào địa chỉ email',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.max' => 'Địa chỉ email quá dài',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.max' => 'Mật khẩu quá dài',
        ];
    }
}
