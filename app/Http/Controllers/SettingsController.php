<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\HuntingAreaRequest;

use App\HuntingArea;
use App\UserGroup;
use App\Configset;
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
        
        return view('dashboard.settings',[
            'roles'=>Role::get(),
            'areas'=>HuntingArea::get(),
            'groups'=>UserGroup::get(),
            'configsets'=>Configset::get(),
            'users'=>User::get(),
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
        if ($request->has('configset_store')) {
            Configset::create($request->toArray());
        }
        if ($request->has('group_store')) {
            UserGroup::create($request->toArray());
        }

        return back();
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
        
        if ($request->has('configset_destroy')) {
            Configset::destroy($id);
        }
        
        if ($request->has('user_destroy')) {
            User::destroy($id);
        }

        if ($request->has('group_destoy')) {
            UserGroup::destroy($id);
        }

        return back();
    }
    public function getarea(){
        $data = HuntingArea::all();
        
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
