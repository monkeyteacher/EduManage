<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'courseName'=>'required',
            'introduction'=>'required',
            'courseTime'=>'required',
            'lecturerID'=>[
                'required',
                Rule::exists('users', 'userID')->where(function ($query) {
                    $query->where('type', 'T');
                })
            ],
        ];
    }

    public function messages()
    {
        return [
            'courseName.required'=>'課程名稱為必填。',
            'introduction.required'=>'課程簡介為必填。',
            'courseTime.required'=>'課程時間為必填。',
            'lecturerID.required'=>'課程講師ID為必填。',
            'lecturerID.exists'=>'講師不存在。',
        ];
    }
}
