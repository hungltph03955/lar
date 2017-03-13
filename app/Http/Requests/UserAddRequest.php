<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'txtUser' => 'required|unique:qt64_users,username',
            'txtPass' => 'required',
            'txtRepass' => 'same:txtPass'
        ];
    }


    public function messages() 
    {
        return [
          'txtUser.required' => 'Tên người dùng không được để trống!',
          'txtUser.unique' => 'Tên người dùng đã trùng!',
          'txtPass.required' => 'Mật khẩu không được để trống!',
          'txtRepass.same' => 'xác nhận mật khẩu không đúng!',
        ];
    }
}
