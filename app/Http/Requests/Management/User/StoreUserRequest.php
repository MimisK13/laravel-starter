<?php

namespace App\Http\Requests\Management\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use function bcrypt;

class StoreUserRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'min:2'
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                Password::min(6)
//                    ->mixedCase()
//                    ->letters()
//                    ->numbers()
//                    ->symbols()
//                    ->uncompromised(),
            ],
            'role' => [
                'required',
                'min:1'
            ],
        ];
    }
}
