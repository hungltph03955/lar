<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsEditRequest extends FormRequest
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
            'sltCate'  => 'required',
            'txtTitle'  => 'required',
            'txtAuthor'  => 'required',
            'txtIntro'  => 'required',
            'txtFull'  => 'required',
            'newsImg'  => 'image',
        ];
    }


    public function messages() 
    {
        return [
            'sltCate.required'  => 'Tên Danh Mục không được để trống',
            'txtTitle.required'  => 'Tên Tiêu Đề không được để trống',
            'txtAuthor.required'  => 'Tên Tác Giả không được để trống',
            'txtIntro.required'  => 'Mục Trích Dẫn không được để trống',
            'txtFull.required'  => 'Mục Nội Dung không được để trống',
            'newsImg.image'  => 'Hình Ảnh Đại Diện Không Đúng Định Dạng',
        ];
    }
}
