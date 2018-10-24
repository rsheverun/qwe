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
        $groups = UserGroup::paginate(20, ['*'], 'groups');
        $users = User::paginate(20, ['*'], 'users');
        $configsets = Configset::paginate(20, ['*'], 'configsets');
        $areas = HuntingArea::paginate(20, ['*'], 'areas');
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
            'user_areas'=>$user_areas->pluck('name')
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        dd($request,$id);
        if ($request->has('area_destroy')) {
            HuntingArea::destroy($request->delete_id);
            $msg = "Area deleted successfully";
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
        
        if ($request->has('configset_destroy')) {
            Configset::destroy($request->delete_id);
            $msg = "Config set deleted successfully";
        }
        
        if ($request->has('user_destroy')) {
            User::destroy($request->delete_id);
            $msg= "User deleted successfully";
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
}
