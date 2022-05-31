<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'The User Name is required!',
          'name.string' => 'The User Name must be a string!',
          'email.required' => 'The User Email is required!',
          'email.string' => 'The User Email must be a string!',
          'email.email' => 'The User Email is not valid!',
          'email.unique' => 'The User Email is already exists!',
        ];
    }
}
