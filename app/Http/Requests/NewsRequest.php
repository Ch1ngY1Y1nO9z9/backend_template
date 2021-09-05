<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'date' => 'required|date',
            'img' => 'bail|mimes:jpeg,gif,png|max:2048',
            'title_ch' => 'required|max:255',
            'content_ch' => 'required',
            'sort' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日期不可留空!',
            'date.date' => '日期格式錯誤!',
            'img.max' => '上傳的檔案過大!',
            'img.mimes' => '上傳的檔案格式錯誤!',
            'title_ch.required' => '標題為必填!',
            'title_ch.max' => '標題過長!',
            'content_ch.required' => '標題為必填!',
            'sort.required' => '排序為必填!',
        ];
    }
}
