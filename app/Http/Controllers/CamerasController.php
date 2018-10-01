<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camera;
use App\Camimage;
use App\UserGroup;
use App\CameraUserGroup;
use App\HuntingArea;
use Session;
use App\Http\Requests\EditCameraRequest;
use App\Http\Requests\StoreCameraRequest;

use App\Configset;

use Auth;

class CamerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        

    }
    public function index()
    {

        $cameras = collect();
        $hunting_areas = collect();
        $user_areas = collect();
        foreach (Auth::user()->usergroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area) {
            $user_areas->push($area->name);
           }
        }
        if (Session::get('area') != null) {
            $groups = HuntingArea::where('name', Session::get('area'))
                                ->first()
                                ->usergroups()
                                ->paginate(20);
            foreach ($groups as $group) {
                foreach ($group->cameras as $camera) {
                    $cameras->push($camera); 
                }
            }
        }

        return view('dashboard.cameras',[
            'cameras'=> $cameras->unique('cam'),
            'user_areas'=>$user_areas->unique()
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
        if ($request->has('group_id')) {
            $cam = Camera::create([
                'cam' => $request->cam,
                'cam_name' => $request->cam_name,
                'cam_model' => $request->cam_model,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'desc' => $request->desc,
                'cam_email' => $request->cam_email,
                'config_id' => $request->config_id
            ]);
            foreach ($request->group_id as $id) {
                CameraUserGroup::create([
                'camera_id' => $cam->id,
                'user_group_id' => $id
            ]);
            }

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
        $hunting_areas = collect();
        $user_areas = collect();
        foreach (Auth::user()->usergroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area) {
            $user_areas->push($area->name);
           }
        }
        return view('dashboard.details',[
            'user_groups'=>UserGroup::all(),
            'camera'=> Camera::find($id),
            'camimages' => Camera::find($id)->camimages->take(3),
            'configsets'=>Configset::all(),
            'user_areas'=> $user_areas->unique(),
        ]);
        
    }

    /**
     * Display all images of camera.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all($id){
        return Camera::find($id)->camimages;
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
       $camera->delete();
       
       return redirect()->route('cameras.index')->withStatus('Camera deleted successfully');
    }
}
