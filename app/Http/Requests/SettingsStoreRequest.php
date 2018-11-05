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
        } elseif ($request->has('area_update')) {

            return [
                'name'=>'required|unique:hunting_areas,name,'.$request->area_update,
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
        } elseif ($request->has('configset_update')) {

            return [
                'model'=>'required|unique:configsets,model,'.$request->configset_update,
                'config_name'=>'required|unique:configsets,config_name,'.$request->configset_update,
            ];
        }
        
        if ($request->has('group_store')) {

            return [
                'name'=>'unique:user_groups|required',                                
            ];
        } elseif ($request->has('group_update')) {

            return [
                'name'=>'required|unique:user_groups,name,'.$request->group_update,
            ];
        }

        if($request->has('user_update')) {

            return [
                'first_name' => 'required|unique:users,first_name,'.$request->user_update,
                'last_name' => 'required|unique:users,last_name,'.$request->user_update,
                'email' => 'required|unique:users,email,'.$request->user_update,
                'nickname' => 'required|unique:users,nickname,'.$request->user_update
            ];
        }
    }
}
