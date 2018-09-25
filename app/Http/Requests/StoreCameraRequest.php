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
            'cam'=>'required',
            'cam_name'=> 'required',
            'cam_model'=> 'required',
            'latitude' => 'numeric|max:9999.999999',
            'longitude' => 'numeric|max:9999.999999',
            'desc' => 'required',
            'cam_email' => 'unique:cameras,cam_email',
            'group_id' => 'required'
        ];
    }
}
