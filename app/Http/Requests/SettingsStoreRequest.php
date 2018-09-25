<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SettingsStoreRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->has('area_store')) {
            return [
                'name'=>'unique:hunting_areas|required',
                'description'=>'required',
                'instance_value' => 'required',
                'instance_description' =>'required',
                'mapview_value' => 'required',
                'mapview_description' => 'required'
            ];
        }

        if ($request->has('configset_store')) {
            return [
                'model'=>'unique:configsets,model|required',
                'config_name'=>'unique:configsets,config_name|required',                 
            ];
        }
        
        if ($request->has('group_store')) {
            return [
                'name'=>'unique:user_groups|required',                                
            ];
        }
    }
}
