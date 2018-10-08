<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\HuntingArea;
use App\User;
use App\Camera;
use Carbon\Carbon;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // change area
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
        if (Session::get('area') != null) {
            $groups = HuntingArea::where('name', Session::get('area'))
                                ->first()
                                ->userGroups()
                                ->get();
            
        }

        if ($request->has('filter')) {
            $date_start = Carbon::parse($request->date_start)
                                ->toDateTimeString();
            $date_to = Carbon::parse($request->date_to)
                                ->addHours(23)
                                ->addMinutes(59)
                                ->toDateTimeString();
            $user_cameras = Camera::with('userGroups')
                    ->whereHas('userGroups', function ($query) {
                                                        $query->with('users')->whereHas('users', function ($query) {
                                                            $query->where('user_id', auth()->user()->id);
                                                        });
                                                    })
                    ->with('camImages')->whereHas('camImages', function($query) use($date_start,$date_to){
                        $query->where('datum', '>=', $date_start)->where('datum','<=',$date_to);
                    })->get();

                    // dd($user_cameras);
                    $data = collect();
                    foreach($user_cameras as $camera) {
                        $data->push($camera->camImages
                        ->where('datum','>=', $date_start)
                        ->where('datum', '<=', $date_to)
                        ->groupBy(function($date) {
                            return Carbon::parse($date->datum)->format('Y-m-d');
                        }));
                    }
                    return view('dashboard.account',[
                        'user_areas' => $user_areas,
                        'data' => $data,
                        'count' => 0,
                        'count_mb'=> 0
                    ]);
                    
        }
        
        return view('dashboard.account',[
            'user_areas' => $user_areas,
            'data' => collect(),
            'count' => 0
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
        //
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date_start, $date_end)
    {
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
        User::destroy($request->user_id);
        return redirect()->route('login');
    }
}
