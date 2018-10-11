<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterImagesRequest;
use Illuminate\Http\Request;
use Auth;
use App\HuntingArea;
use Session;
use App\Camimage;
use App\Camera;
use Carbon\Carbon;
use App\Comment;
use App\Activity;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterImagesRequest $request)
    {
        $hunting_areas = collect();
        $user_areas = collect();
        
        foreach (Auth::user()->userGroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area)
            $user_areas->push($area->name);
        }
        
        $camimages = Camimage::with('camera')
            ->whereHas('camera', function($query){
                $query->with('userGroups')->whereHas('userGroups', function($query){
                    $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                    ->with('hunting_areas')->whereHas('hunting_areas', function($query){
                        $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                    });
                });
            })
            ->orderBy('datum', 'desc')
            ->paginate(20);
           
        $user_cameras = Camera::with('userGroups')
            ->whereHas('userGroups', function ($query) {
                                                $query->with('users')->whereHas('users', function ($query) {
                                                    $query->where('user_id', auth()->user()->id);
                                                });
                                            })
            ->get();
            
        if ($request->has('filter')) {
            
            if ($request->has('date_start') && $request->has('date_to') && $request->camera_id == 0) {
                $date_start = Carbon::parse($request->date_start)
                                ->toDateTimeString();
                $date_to = Carbon::parse($request->date_to)
                                    ->addHours(23)
                                    ->addMinutes(59)
                                    ->toDateTimeString();
                $camimages = Camimage::with('camera')
                ->whereHas('camera', function($query){
                    $query->with('userGroups')->whereHas('userGroups', function($query){
                        $query->with('hunting_areas')->whereHas('hunting_areas', function($query){
                            $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                        });
                    });
                })
                ->where('datum', '>=', $date_start)
                ->where('datum', '<=', $date_to)
                ->orderBy('datum', 'desc')
                ->paginate(20);
            } elseif ($request->date_start == null && $request->date_to == null) {
                $cam_email = Camera::find($request->camera_id)->cam_email;
                $camimages = Camimage::with('camera')
                    ->whereHas('camera', function($query) use($cam_email){
                        $query->where('cam_email', $cam_email)->with('userGroups')->whereHas('userGroups', function($query){
                            $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                            ->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                            });
                        });
                })
                ->orderBy('datum', 'desc')
                ->paginate(20);
                
            } elseif($request->has('date_start') && $request->has('date_to') && $request->camera_id != 0) {
                $cam_email = Camera::find($request->camera_id)->cam_email;
                $date_start = Carbon::parse($request->date_start)
                                ->toDateTimeString();
                $date_to = Carbon::parse($request->date_to)
                                    ->addHours(23)
                                    ->addMinutes(59)
                                    ->toDateTimeString();
                $camimages = Camimage::with('camera')
                    ->whereHas('camera', function($query) use ($cam_email){
                        $query->where('cam_email', $cam_email)
                            ->with('userGroups')
                            ->whereHas('userGroups', function($query){
                                $query->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                    $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                                });
                        });
                    })
                    ->where('datum', '>=', $date_start)
                    ->where('datum', '<=', $date_to)
                    ->orderBy('datum', 'desc')
                    ->paginate(20);
            } elseif ($request->camera_id != 0 && $request->has('date_start') == false && $request->has('date_to') == false) {
                $cam_email = Camera::find($request->camera_id)->cam_email;
                $camimages = Camimage::with('camera')
                ->whereHas('camera', function($query) use ($cam_email){
                    $query->where('cam_email', $cam_email)
                        ->with('userGroups')
                        ->whereHas('userGroups', function($query){
                            $query->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                            });
                    });
                })
                ->orderBy('datum', 'desc')
                ->paginate(20);
            }
        }
         
        return view('dashboard.images', [
            'user_areas'=>$user_areas,
            'cameras'=> $user_cameras,
            'camimages' => $camimages
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
     * Add new comment for image.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_comment(Request $request, $id)
    {
         Comment::create([
            'user_id' => auth()->user()->id,
            'camimage_id' => $id,
            'text' => $request->text
        ]);
    }

    public function get_comments($id) {
        $comments = Comment::with('user')->where('camimage_id', $id)->get();
        return $comments;
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
    public function destroy($id)
    {
        Camimage::destroy($id);
        try{
            Activity::where('image_id', $id)->delete();
        } catch(\Exception $e) {
            
        }

        return back()->withStatus('Images deleted successfully');
    }
}
