<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
class CreatePost extends FormRequest
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
            'title'=> 'required',
            'content' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png,gif,'
        ];
    }
    public function messages()
    {
        return 
        [
             'title.required' => 'title khong duoc de trong',
             'content.required' => 'content khong duoc de trong',
             'img.required' => 'anh khong duoc de trong',
             'imh.mimes' => 'anh chua dung dinh dang'

         ];
    }
}
