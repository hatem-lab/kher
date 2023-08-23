<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => Lang::get('auth.this email is required',[],Config::get('app.locale')),
            'email.email' => Lang::get('auth.this email is required',[],Config::get('app.locale')),
            'password.required' => Lang::get('auth.this password is required',[],Config::get('app.locale')),
        ];
    }
}
