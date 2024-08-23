<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'role_id' => 'required|integer',
            'password' => 'sometimes|nullable|min:8',
            'password_confirmation' => 'required_unless:password,null|same:password',
        ];

    }
    
    public function messages()
    {
        return [
            'password_confirmation.required_unless' => 'Password and Confirm password must be same.',
        ];
    }

}
