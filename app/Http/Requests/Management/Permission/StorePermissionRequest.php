<?php

namespace App\Http\Requests\Management\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
                'unique:permissions',
                'min:3',
                'max:255'
            ],
//            'guard_name' => [
//                'max:255'
//            ]
        ];
    }
}
