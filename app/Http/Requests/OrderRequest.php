<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'ten' => 'required',
            'diachi' => 'required',
            'sodienthoai'=> 'required|regex:/(0)[0-9]{9}/'
        ];
    }
    public function messages()
    {
        return [
            'ten.required' => 'Vui lòng nhập tên người nhận hàng !',
            'diachi.required' => 'Vui lòng nhập địa chỉ nhận hàng !',
            'sodienthoai.required' => 'Vui lòng nhập số điện thoại để nhập hàng',
            'sodienthoai.regex' => 'Vui lòng nhập đúng số điện thoại' 
        ];
    }
}
