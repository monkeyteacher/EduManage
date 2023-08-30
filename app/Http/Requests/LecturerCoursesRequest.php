<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LecturerCoursesRequest extends FormRequest
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
            'lecturerID'=>[
                'nullable',
                Rule::exists('users', 'userID')->where(function ($query) {
                    $query->where('type', 'T');
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'lecturerID.exists'=> '講師不存在。'
        ];
    }
}
