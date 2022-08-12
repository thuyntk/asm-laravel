<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:32|min:6',
            'email' => 'required|email|max:32|min:6',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'username' => 'required|max:20',
            'code' => 'required|max:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập name',
            'name.min' => 'Name tối thiểu 6 ký tự',
            'name.max' => 'Name tối đa 32 ký tự',
            'email.required' => 'Bắt buộc nhập email',
            'email.min' => 'Email tối thiểu 6 ký tự',
            'email.max' => 'Email tối đa 32 ký tự',
            'email.email' => 'Email phải đúng định dạng',
            'password.required' => 'Bắt buộc nhập password',
            'password.min' => 'Password tối thiểu 8 ký tự',
            'password_confirmation.required_with' => 'Bắt buộc nhập password',
            'password_confirmation.same' => 'Bắt buộc nhập giống password',
            'password_confirmation.min' => 'Password tối thiểu 8 ký tự',
            'code.required' => 'Bắt buộc nhập code',
            'code.max' => 'Code tối đa 10 ký tự',
            'username.required' => 'Bắt buộc nhập username',
            'username.max' => 'Username tối đa 20 ký tự',


        ];
    }
}
