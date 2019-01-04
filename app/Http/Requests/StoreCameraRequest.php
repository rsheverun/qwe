<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCameraRequest extends FormRequest
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
            'cam'=>'required|max:50',
            'cam_name'=> 'required|max:50',
            'cam_model'=> 'required|max:50',
            'latitude' => 'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
            'desc' => 'required',
            'cam_email' => 'unique:cameras,cam_email',
            'group' => 'required'
        ];
    }
}
