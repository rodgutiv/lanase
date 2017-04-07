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
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required',
                    'password' => 'confirmed|required',
                    // 'email' => 'unique:users,email,',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required',
                    'type' => 'required',
                    'email' => 'unique:users,email,'.$this->segment(3),
                ];
            }
        }

    }
}
