<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'img' => 'bail|mimes:jpeg,gif,png|max:2048',
            'type' => 'required',
            'name_ch' => 'required|max:255',
            'content_ch' => 'required',
            'links' => 'required|max:255',
            'sort' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'img.max' => '上傳的檔案過大!',
            'img.mimes' => '上傳的檔案格式錯誤!',
            'type.required' => '分類不可為空!',
            'name_ch.required' => '產品名稱不可為空!',
            'name_ch.max' => '產品名稱過長!',
            'content_ch.required' => '簡述不可為空!',
            'links.required' => '超連結不可為空!',
            'links.max' => '網址過長!',
            'sort.required' => '排序為必填!',
        ];
    }
}
