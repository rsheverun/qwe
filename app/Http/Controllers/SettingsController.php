<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\HuntingAreaRequest;

use App\HuntingArea;
use App\UserGroup;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $areas = HuntingArea::all();
        $groups = UserGroup::all();

        return view('dashboard.settings',[
            'roles'=>$roles,
            'areas'=>$areas,
            'groups'=>$groups
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
    public function store(Request $request)
    {
        if($request->has('hunting_area')) {
            HuntingArea::create([
                'name' => $request->area_name,
                'description'=>$request->area_desc
            ]);
        }
            
        if ($request->has('configset_store')) {
            dd($request);
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
        if ($request->has('hunting_area')) {
            $hunting_area = HuntingArea::destroy($id);
        }
        if ($request->has('group_destroy')) {
            UserGroup::destroy($id);
        }
        return back();
    }
    public function getarea(){
        $data = HuntingArea::all();
        
        return $data;
    }

    public function deleteitem(Request $request)
    {
        $data = HuntingArea::destroy($request->id);
    }
}
