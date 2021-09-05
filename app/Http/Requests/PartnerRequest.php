<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'img' => 'bail|mimes:jpeg,gif,png|max:2048',
            'title_ch' => 'required',
            'sort' => 'required',
            'links' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'img.max' => '上傳的檔案過大!',
            'img.mimes' => '上傳的檔案格式錯誤!',
            'title_ch.required' => '標題為必填!',
            'sort.required' => '排序為必填!',
            'links.max' => '網址過長!',
        ];
    }
}
