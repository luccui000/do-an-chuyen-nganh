<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_sp' => 'required|max:200',
            'slug' => 'max:255',
            'danhmuc_id' => 'required|exists:danhmucs,id',
            'thuonghieu_id' => 'required|exists:thuonghieus,id',
            'nhacungcap_id' => 'required|exists:nhacungcaps,id',
            'quycach_id' => 'required|exists:quycachs,id',
            'hinh_anh' => 'max:200',
            'ma_sp' => 'required|max:30',
            'mo_ta_ngan' => 'required|max:200',
            'gia_sp' => 'required|numeric',
            'gia_khuyen_mai' => 'numeric',
            'sp_noi_bat' => 'numeric',
            'ton_kho' => 'required|numeric'
        ];
    }
    public function messages(): array
    {
        return [
            'ten_sp.required' => 'Vui lòng nhập vào tên sản phẩm',
            'ten_sp.max' => 'Vui lòng nhập tên sản phẩm dưới :max ký tự',
            'slug.max' => 'Vui lòng nhập đường dẫn tối đa :max ký tự',
            'danhmuc_id.required' => 'Vui lòng nhập chọn danh mục',
            'danhmuc_id.exists' => 'Không tồn tại danh mục vừa chọn',
            'thuonghieu_id.required' => 'Vui lòng chọn thương hiệu',
            'thuonghieu_id.exists' => 'Không tồn tại thương hiệu vừa chọn',
            'nhacungcap_id.required' => 'Vui lòng chọn nhà cung cấp',
            'quycach_id.required' => 'Vui lòng chọn quy cách sản phẩm',
            'quycach_id.exists' => 'Không tồn tại quy cách vừa chọn',
            'ma_sp.required' => 'Vui lòng nhập vào mã sản phẩm',
            'ma_sp.max' => 'Vui lòng nhập không quá :max ký tự',
            'ma_sp.exists' => 'Mã sản phẩm đã tồn tại',
            'hinh_anh.max' => 'Đường dẫn hình ảnh quá dài',
            'mo_ta_ngan.required' => 'Vui lòng nhập vào mô tả',
            'gia_sp.numeric' => 'Giá sản phẩm không đúng định dạng',
            'gia_sp.required' => 'Vui lòng nhập vào giá của sản phẩm',
            'gia_khuyen_mai.numeric' => 'Giá khuyến mãi không đúng định dạng',
            'sp_noi_bat.numeric' => 'Chọn sản phẩm nổi bật không đúng định dạng',
            'ton_kho.required' => 'Vui lòng nhập vào số lượng tồn kho',
            'ton_kho.numeric' => 'Tồn kho nhập vào không đúng định dạng'
        ];
    }
}
