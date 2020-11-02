<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'contact_name' => 'required|max:255',
            'contact_email' => 'required|max:255',
            'contact_detail' => 'required|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'contact_name.required' => 'お名前を入力してください',
            'contact_name.max' => 'お名前は255文字までで入力してください',
            'contact_email.required' => 'メールアドレスを入力してください',
            'contact_email.max' => 'メールアドレスは255文字までで入力してください',
            'contact_detail.required' => 'お問い合わせ内容を入力してください',
            'contact_detail.max' => 'お問い合わせ内容は2000文字までで入力してください',
        ];
    }
}
