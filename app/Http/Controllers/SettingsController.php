<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsStoreRequest;
use App\HuntingArea;
use App\UserGroup;
use App\Configset;
use App\VmapInstanceConfig;
use App\VmapMapviewConfig;
use App\User;
use App\HuntingAreaUserGroup;
use App\UserUserGroup;
use Session;
use Auth;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = UserGroup::orderBy('created_at')->paginate(20, ['*'], 'groups');
        $users = User::orderBy('created_at')->paginate(20, ['*'], 'users');
        $configsets = Configset::orderBy('created_at')->paginate(20, ['*'], 'configsets');
        $areas = HuntingArea::orderBy('created_at')->paginate(20, ['*'], 'areas');
        $user_areas = HuntingArea::with('userGroups')->whereHas('userGroups', function($query){
            $query->whereIn('user_group_id', auth()->user()->userGroups->pluck('id'));
        })->get();
        
        return view('dashboard.settings',[
            'roles'=>Role::get(),
            'areas'=>$areas,
            'areas_list'=>HuntingArea::all(),
            'groups'=>$groups,
            'groups_list'=>UserGroup::all(),
            'configsets'=>$configsets,
            'users'=>$users,
            'user_areas'=>$user_areas
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingsStoreRequest $request)
    {    
        if ($request->has('area_store')) {
            $instace_config = VmapInstanceConfig::create([
                'value' => $request->instance_value,
                'description' => $request->instance_description
            ]);
            $mapview_config = VmapMapviewConfig::create([
                'value' => $request->mapview_value,
                'description' => $request->mapview_description
            ]);
            $request->request->add([
                'vmap_instance_id' => $instace_config->id,
                'vmap_mapviewid_id' => $mapview_config->id
            ]);
            HuntingArea::create($request->toArray());
            $msg = "Hunting area created successfully";

        }

        if ($request->has('configset_store')) {
            Configset::create($request->toArray());
            $msg = "Config set created successfully";

        }
        if ($request->has('group_store')) {
            if ($request->has('areas')) {
                $group = UserGroup::create($request->toArray());
                foreach ($request->areas as $id) {
                    HuntingAreaUserGroup::create([
                        'hunting_area_id'=>$id,
                        'user_group_id'=>$group->id
                    ]);
                }
            } else {
                return back()->withErrors('Please select a hunting areas to which the user group belongs');
            }
            $msg = "User group created successfully";
        }

        return back()->withStatus($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('area_update')) {
            $hunting_area = HuntingArea::find($request->area_update);
            $hunting_area->update($request->toArray());
            $instance_config = VmapInstanceConfig::find($hunting_area->id);
            $map_config = VmapMapviewConfig::find($hunting_area->id);
            $instance_config->value = $request->instance_value;
            $instance_config->description = $request->instance_description;
            $instance_config->save();
            $map_config->value = $request->mapview_value;
            $map_config->description = $request->mapview_description;
            $map_config->save();
            $msg = "Hunting area updated succesfully";
        }
        
        if ($request->has('group_update')) {
            UserGroup::find($request->group_update)->update($request->toArray());
            if($request->has('areas')) {
                HuntingAreaUserGroup::where('user_group_id', $request->group_update)->delete();
                foreach ($request->areas as $id) {
                    HuntingAreaUserGroup::create([
                        'hunting_area_id'=>$id,
                        'user_group_id'=>$request->group_update
                    ]);
                }
            }
            $msg = "Group updated succesfully";
            
        }
        
        if ($request->has('configset_update')) {
            Configset::find($request->configset_update)->update($request->toArray());
            $msg = "Config set deleted successfully";
        }
        
        if ($request->has('user_update')) {
            $user = User::find($request->user_update)->update($request->toArray());
            if($request->has('group')) {
                UserUserGroup::where('user_id', $request->user_update)->delete();
                foreach ($request->group as $id) {
                    UserUserGroup::create([
                        'user_group_id'=>$id,
                        'user_id'=>$request->user_update
                    ]);
                }
            }
            $msg= "User updated successfully";
        }

        return back()->withStatus($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->has('area_destroy')) {
            $areas = HuntingArea::find($request->delete_id)->userGroups;
            if(HuntingArea::find($request->delete_id)->userGroups->count() == 0) {
                HuntingArea::destroy($request->delete_id);
                $msg = "Area deleted successfully";
            }
        
            else {
                return back()->withErrors('You can not delete a hunting area in which there are still groups');
            }
        }
        
        if ($request->has('group_destroy')) {
            $usergroup = Usergroup::find($request->delete_id)->users;
            if(Usergroup::find($request->delete_id)->users->count() == 0) {
                UserGroup::destroy($request->delete_id);
                $msg = "Group deleted successfully";
            }
            else {
                return back()->withErrors('You can not delete a group in which there are still users');
            }
            
        }

        if ($request->has('user_destroy')) {
            User::destroy($request->delete_id);
            $msg= "User deleted successfully";
        }

        if ($request->has('configset_destroy')) {
            Configset::destroy($request->delete_id);
            $msg = "Config set deleted successfully";
        }
        
        

        return back()->withStatus($msg);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getarea(){
        
        $data = HuntingArea::paginate(20, ['*'], 'areas');
        
        return $data;
    }

    /**
     * Store a newly created hunting area in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_area(Request $request)
    {
        HuntingArea::create([
            'name' => $request->area_name,
            'description'=>$request->area_desc
        ]);
    }

    /**
     * Remove the hunting area from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteitem(Request $request)
    {
        $data = HuntingArea::destroy($request->id);
    }

    public function getData(Request $request){

        if($request->has('area_update')) {
            $area = HuntingArea::find($request->id);
            $instance_config = VmapInstanceConfig::find($area->id);
            $map_config = VmapMapviewConfig::find($area->id);

            return view("layouts.edit_hunting_area_modal", [
                'id' => $area->id,
                'name' =>$area->name,
                'description' => $area->description,
                'instance_value' => $instance_config->value,
                'instance_description' => $instance_config->description,
                'map_value' => $map_config->value,
                'map_description' => $map_config->description
            ])->render();
        } elseif ($request->has('group_update')) {
            $group = UserGroup::find($request->id);
            
            return view("layouts.edit_group_modal", [
                'id' => $group->id,
                'group' => UserGroup::find($request->id),
                'roles'=> Role::all(),
                'areas_list' => HuntingArea::all(),
            ]);
        
        }  elseif ($request->has('user_update')) {
            
            return view("layouts.edit_user_modal",[
                'user' => User::find($request->id),
                'groups_list'=> UserGroup::all(),
                'user_usergroups' => User::find($request->id),
            ]);
        } elseif ($request->has('config_update')) {
           
            return view("layouts.edit_config_modal", [
                'configset' => Configset::find($request->id)
            ]);
        } elseif ($request->has('change-area-modal')) {
            $user_areas = HuntingArea::with('userGroups')->whereHas('userGroups', function($query){
                $query->whereIn('user_group_id', auth()->user()->userGroups->pluck('id'));
            })->get();
            
            return view("layouts.change_area",['user_areas' => $user_areas]);
        } elseif ($request->has('create_cam')) {
            $usergroups = UserGroup::whereHas('hunting_areas',function($query) {
                $query->where('hunting_area_id', Session::get('area'));
            })
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get(); 
            return view("layouts.create_cam_modal",[
                'user_groups'=>$usergroups,
                'configsets'=>Configset::all()
                ]);
        } elseif($request->has('test')) {
            return view ('layouts.test');
        }

    }
}
