<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyCachRequest extends FormRequest
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
            'ten_quy_cach' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ten_quy_cach.required' => 'Vui lòng nhập tên quy cách'
        ];
    }
}
