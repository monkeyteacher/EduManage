<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'lecturerName'=>'required',
            'uLogin'=>'required|unique:users,ulogin|max:100',
            'password'=>'required',
            'email'=>'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'lecturerName.required'=>'講師名稱為必填。',
            'uLogin.required'=>'講師帳號為必填。',
            'uLogin.unique'=>'講師帳號已經存在。',
            'uLogin.max'=>'講師帳號長度不能超過100',
            'password.required'=>'講師密碼為必填。',
            'email.required'=>'email為必填。',
            'email.unique'=>'此email已經存在。',
            'email.email'=>'此email不符合格式。',
        ];
    }
}
