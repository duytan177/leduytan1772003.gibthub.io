<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'masp'=>'required',
            'tensp'=>'required',
            'color' => 'required',
            'size' => 'required',
            'soluong' => 'required',
            'gia'=>'required|numeric',
            'anh'=>'image|max:350'
        ];
    }

    public function messages()
    {
        return [
            'masp.required'=>'Vui lòng nhập mã sản phẩm !',
            'tensp.required'=>'Vui lòng nhập tên sản phẩm !',
            'color.required'=>'Vui lòng nhập màu của sản phẩm !',
            'size.required'=>'Vui lòng nhập kích thước của sản phẩm !',
            'soluong.required'=>'Vui lòng nhập só lượng sản phẩm !',
            'gia.required'=>'Vui lòng nhập giá sản phẩm !',
            'gia.numeric'=>'Giá sản phẩm phải kiểu số !',
            'anh.image'=>'Không phải là file ảnh !',
            'anh.max'=>'Kích thước file không vượt quá 350KB !'
        ];
    }
}
