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
        
        return view('dashboard.settings',[
            'roles'=>Role::get(),
            'areas'=>$areas,
            'groups'=>$groups,
            'configsets'=>$configsets,
            'users'=>$users,
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
            UserGroup::create($request->toArray());
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
        if ($request->has('area_destroy')) {
            HuntingArea::destroy($id);
            $msg = "Area deleted successfully";
        }
        
        if ($request->has('group_destroy')) {
            UserGroup::destroy($id);
            $msg = "Group deleted successfully";
        }
        
        if ($request->has('configset_destroy')) {
            Configset::destroy($id);
            $msg = "Config set deleted successfully";
        }
        
        if ($request->has('user_destroy')) {
            User::destroy($id);
            $msg= "User deleted successfully";
        }

        return back()->withErrors($msg);
    }
    public function getarea(){
        
        $data = HuntingArea::paginate(20, ['*'], 'areas');
        
        return $data;
    }

    public function store_area(Request $request)
    {
        HuntingArea::create([
            'name' => $request->area_name,
            'description'=>$request->area_desc
        ]);
    }
    public function deleteitem(Request $request)
    {
        $data = HuntingArea::destroy($request->id);
    }
}
