<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchAreaRequest extends FormRequest
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
                    'title_es' => 'required',
                    'title' => 'required',
                    'display' => 'required',
                    'image' => 'required|image',
                ];
            }
            case 'PUT':
            {
                return [
                    'title_es' => 'required',
                    'title' => 'required',
                    'display' => 'required',
                    'image' => 'image',
                ];
            }
        }
        
    }
}
