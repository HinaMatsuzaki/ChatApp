<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user.birthday' => 'required',
            'user.languages_native_id' => 'required',
            'user.languages_learn_id' => 'required',
            'hobbies.*' => 'required',
            'user.self_introduction' => 'max:255',
        ];
    }
    
    public function messages()
    {
        return [
            'user.birthday.required' => 'Please enter your name',
            'user.languages_native_id.required' => 'Please select your first language',
            'user.language.languages_learn_id.required' => '年齢は必須項目です。',
            'hobbies.*.required' => 'Please select your hobbies',
            'user.self_introduction.max:500' => 'Self Introduction is too long (maximum is 500 characters)',
        ];
    }
}
