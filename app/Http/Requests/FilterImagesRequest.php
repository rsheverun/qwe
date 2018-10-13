<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterImagesRequest extends FormRequest
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
    public function messages()
    {
        return [
            'date_to.required_if' => 'Er, you forgot your email address!',
        ];
    }
    public function rules()
    {
        return [
            'date_start'=>'date',
            'date_to'=>'date'
        ];
    }


}
