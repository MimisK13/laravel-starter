<?php

namespace App\Http\Requests\Management\Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
                'required',
                'unique:permissions,name,'. request()->route('permission')->id,
                'min:3',
                'max:255'
            ],
//            'guard_name' => [
//                'required',
//                'max:255'
//            ]
        ];
    }
}
