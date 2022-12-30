<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=> 'required',
            'email' => 'email|unique:users,email',
            'password' => 'required|min:8',
            'xacnhanpass' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập nhập t ên người dùng !',
            'email.email'=>'Vui lòng nhập địa chỉ email @ !',
            'email.unique'=>'Email đã được đăng ký tài khoản !',
            'password.required'=>'Vui lòng nhập mật khẩu  !',
            'password.min'=>'Mật khẩu phải có 8 ký tự trở lên  !',
            'xacnhanpass.required'=>'Vui lòng nhập mật khẩu xác nhận !',
            'xacnhanpass.same' => 'Mật khẩu không trùng khớp'
        ];
    }

}
