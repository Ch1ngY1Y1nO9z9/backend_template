<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
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
            'title' => 'required',
            'keyword' => 'required',
            'description' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '網頁名稱不可留空!',
            'keyword.required' => '關鍵字不可留空!',
            'description.required' => '網頁描述不可留空!',
            'description.size' => '內容過多!網頁描述最多255個字(包含標點符號)',
        ];
    }
}
