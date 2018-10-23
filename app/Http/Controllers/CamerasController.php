<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camera;
use App\Camimage;
use App\UserGroup;
use App\CameraUserGroup;
use App\HuntingArea;
use App\Activity;

use Session;
use App\Http\Requests\EditCameraRequest;
use App\Http\Requests\StoreCameraRequest;

use App\Configset;

use Auth;
use DB;
class CamerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get hunting area
        $cameras = collect();
        $hunting_areas = collect();
        $user_areas = collect();
        foreach (Auth::user()->userGroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area) {
            $user_areas->push($area->name);
           }
        }
        try {
            $userGroups_areas = UserGroup::whereHas('hunting_areas', function($query){
                $query->where('name', Session::get('area'));
            })->get()->pluck('id');
            $cameras = Camera::whereHas('userGroups', function($query) use($userGroups_areas) {
                $query->whereIn('user_group_id', $userGroups_areas);
            })->paginate(20);
        } catch(\Exception $e) {
            //
        }
        
         $usergroups = UserGroup::whereHas('users', function ($query) {
             $query->where('user_id', auth()->user()->id);
         })->get();                                           
        return view('dashboard.cameras',[
            'cameras'=> $cameras,
            'user_areas'=>$user_areas->unique(),
            'latitude'=>$cameras->avg('latitude'),
            'longitude'=>$cameras->avg('longitude'),
            'user_groups'=>$usergroups,
            'configsets'=>Configset::all(),
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
    public function store(StoreCameraRequest $request)
    {
        if ($request->has('group')) {
            $cam = Camera::create($request->except('group'));
            foreach ($request->group as $id) {
                CameraUserGroup::create([
                'camera_id' => $cam->id,
                'user_group_id' => $id
            ]);
            }
            Activity::create([
                'name' => "new device",
                'camera_id' => $cam->id,
                'date' => $cam->created_at
            ]);

            return back()->withStatus('New camera added successfully');
        } else {
            
            return back()->withError('Please select a user groups to which the camera belongs');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $available_cameras= auth()->user()->usergroups()->whereHas('hunting_areas', function($query) {
            $query->where('name',Session::get('area'));
            })->with('cameras')
            ->get()
            ->pluck('cameras')
            ->collapse()
            ->unique('cam_email')
            ->pluck('id')
            ->search($id, false); // return int or false
        if(auth()->user()->hasAnyRole('admin|user') && is_int($available_cameras)){
            $camera =  Camera::find($id);
            $hunting_areas = collect();
            $user_areas = collect();
            foreach (Auth::user()->userGroups as $group) {
                $hunting_areas->push($group->hunting_areas);
            }
            foreach ($hunting_areas as $hunting_area){
            foreach ($hunting_area as $area) {
                $user_areas->push($area->name);
            }
            }
            $images = $camera->camImages->sortByDesc('datum');
            $usergroups = UserGroup::whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get(); 

            $models = Camera::get()->pluck('cam_model');
            return view('dashboard.details',[
                'user_groups'=>$usergroups,
                'camera'=> Camera::find($id),
                'camimages' => $images->take(3),
                'configsets'=>Configset::all(),
                'user_areas'=> $user_areas->unique(),
                'models_cam'=>$models
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display all images of camera.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all($id){
        $camimages = Camera::find($id)->camImages->sortByDesc('datum');
        return $camimages;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCameraRequest $request, Camera $camera)
    {
        $camera->update($request->toArray());
        return back()->withStatus('Camera updated successfully');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camera $camera)
    {
        try{
            Activity::where('camera_id', $camera->id)->delete();
        } catch(\Exception $e) {
                
        }
        $camera->delete();

        return redirect()->route('cameras.index')->withStatus('Camera deleted successfully');
    }
}
