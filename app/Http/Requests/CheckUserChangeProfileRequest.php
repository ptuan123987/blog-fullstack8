<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckUserChangeProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required | min:3 | max:50 | regex:/[a-zA-Z0-9]/',
            'email' => 'required | email ',
            'password' => 'nullable | min:6',
        ];
    }
    public function messages(): array{
        return [
            //
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute phải có ít nhất 3 kí tự',
            'name.max' => ':attribute phải có ít nhất 50 kí tự',
            'name.regex' => ':attribute không hợp lệ',
            'email.email' => ':attribute không hợp lệ',
            'email.required' => ':attribute không được để trống',
            'password.min' => ':attribute phải có ít nhất 6 kí tự',
        ];
    }
    public function attributes(): array{
        return [
            //
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];
    }
}
