<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
     return [
        'title'=> 'required',
        'content' => 'required',
        'img' => 'required|mimes:jpg,jpeg,png,gif,'
    ];
}
public function messages()
{
    return [
        'title.required' => 'Bạn chưa nhập title',
        'content.required' => 'Bạn chưa nhập content',
        'img.required' => 'Bạn chưa chọn ảnh',
        'img.mimes' => 'Ảnh chưa đúng định dạng'
    ];
}
}
