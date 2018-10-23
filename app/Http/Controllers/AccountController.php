<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilterImagesRequest;
use Auth;
use Session;
use App\HuntingArea;
use App\User;
use App\Camimage;
use App\Camera;
use App\UserGroup;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterImagesRequest $request)
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
// dd(auth()->user()->usergroups->pluck('id'));

//This would contain all data to be sent to the view//This would contain all data to be sent to the view
        $data = array();

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection();

        //Define how many items we want to be visible in each page
        $per_page = 2;

        //Slice the collection to get the items to display in current page
        $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();

        //Create our paginator and add it to the data array
        $data['images'] = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);

        //Set base url for pagination links to follow e.g custom/url?page=6
        $data['images']->setPath($request->url());
        if ($request->has('filter')) {
            $date_start = Carbon::parse($request->date_start)
                                ->toDateTimeString();
            $date_to = Carbon::parse($request->date_to)
                                ->addHours(23)
                                ->addMinutes(59)
                                ->toDateTimeString();
            $usergroups = UserGroup::whereHas('hunting_areas', function($query){
                    $query->where('name', Session::get('area'));
                })->get()->pluck('id');
            $images = Camimage::with('camera')->whereHas('camera', function($query) use ($usergroups){
                    $query->whereHas('userGroups', function($query) use ($usergroups){
                        $query->whereIn('user_group_id', $usergroups);
                    });
                })
            ->whereDate('datum','>=', $date_start)->whereDate('datum', '<=', $date_to)
            ->get();
            // ->groupBy(function($date) {
            //             return Carbon::parse($date->datum)->format('Y-m-d');
            //         })
            // ->sortBy(function($value, $key){
            //         return $key;
            //     });
            $group_images = $images->groupBy(function($date) {
                            return Carbon::parse($date->datum)->format('Y-m-d');
                        })
                        ->sortBy(function($value, $key){
                                return $key;
                            });
                //This would contain all data to be sent to the view//This would contain all data to be sent to the view
                $data = array();

                //Get current page form url e.g. &page=6
                $currentPage = LengthAwarePaginator::resolveCurrentPage();

                //Create a new Laravel collection from the array data
                $collection = new Collection($group_images);

                //Define how many items we want to be visible in each page
                $per_page = 20;

                //Slice the collection to get the items to display in current page
                $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();

                //Create our paginator and add it to the data array
                $data['images'] = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);

                //Set base url for pagination links to follow e.g custom/url?page=6
                $data['images']->setPath($request->fullUrl());
                
                    return view('dashboard.account',[
                        'user_areas' => $user_areas,
                        'data' => $data['images'],
                        'count' => $images->count(),
                        'count_mb'=> 0,
                        'msg'=>'No data available in table'
                    ]);
                    
        }
        
        return view('dashboard.account',[
            'user_areas' => $user_areas,
            'data' => $data['images'],
            'count' => 0,
            'msg'=>'Please select a date range'
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
        User::destroy($request->delete_id);
        return redirect()->route('login');
    }
}
