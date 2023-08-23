<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name_ar' => 'required|max:100',
            'name_en' => 'required|max:100',
            'password' => 'required|min:6',
            'confirm-password' =>'required_with:password|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'name_ar is required',
            'name_en.required' => 'name_en is required',
            'password.required' => 'password is required',
            'confirm-password.required' => 'confirm-password is required',
        ];
    }
}
