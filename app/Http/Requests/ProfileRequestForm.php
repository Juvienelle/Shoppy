<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequestForm extends FormRequest
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
            'name'       		=> 'required|string',
            'bio' 				=> 'required|string',
            'about'             => 'required|string',
            'country' 			=> 'required|string',
            'phone' 			=> 'required|regex:/^[0-9]*$/',
            'city' 				=> 'required|string',
            'street'    		=> 'required|string',
        ];
    }
}
