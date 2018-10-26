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
use Mail;
use App\Mail\ForwardImage;

class ImagesController extends Controller
{
    public $statistics;

    public function __construct(){
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterImagesRequest $request)
    {
       
        $user_areas = HuntingArea::with('userGroups')->whereHas('userGroups', function($query){
            $query->whereIn('user_group_id', auth()->user()->userGroups->pluck('id'));
        })->get();
        try {

            $camimages = Camimage::with('camera')
                ->whereHas('camera', function($query){
                    $query->whereHas('userGroups', function($query){
                        $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                        ->whereHas('hunting_areas', function($query){
                            $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                        });
                    });
                })
                ->orderBy('datum', 'desc')
                ->paginate(20);
            
            $user_cameras= auth()->user()->usergroups()->whereHas('hunting_areas', function($query) {
                    $query->where('name',Session::get('area'));
                    })->with('cameras')
                    ->get()
                    ->pluck('cameras')
                    ->collapse()
                    ->unique('cam_email');
        } catch(\Exception $e){
            return redirect()->route('home')->withErrors('You do not have any available hunting areas');
        }
        if ($request->has('filter')) {
            if ($request->date_start != null && $request->date_to != null && $request->camera_id == 0) {
                $date_start = Carbon::parse($request->date_start)
                                ->toDateTimeString();
                $date_to = Carbon::parse($request->date_to)
                                    ->addHours(23)
                                    ->addMinutes(59)
                                    ->toDateTimeString();
                                    // dump($date_start,$date_to);
                $camimages = Camimage::with('camera')
                ->whereHas('camera', function($query){
                    $query->whereHas('userGroups', function($query){
                        $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                            ->whereHas('hunting_areas', function($query){
                                $query->where('hunting_area_id', HuntingArea::where('name', 
                                                                                    Session::get('area'))
                                                                                    ->first()
                                                                                    ->id
                                                                                );
                        });
                    });
                })
                ->whereDate('datum', '>=', $date_start)
                ->whereDate('datum', '<=', $date_to)
                ->orderBy('datum', 'desc')
                ->paginate(20);
            } elseif ($request->date_start == null && $request->date_to == null && $request->camera_id != 0) {
                $cam_email = Camera::find($request->camera_id)->cam_email;
                $camimages = Camimage::with('camera')
                    ->whereHas('camera', function($query) use($cam_email){
                        $query->where('cam_email', $cam_email)->whereHas('userGroups', function($query){
                            $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                            ->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                $query->where('hunting_area_id', HuntingArea::where('name', 
                                                                                    Session::get('area'))
                                                                                    ->first()
                                                                                    ->id
                                                                                );
                            });
                        });
                })
                ->orderBy('datum', 'desc')
                ->paginate(20);
                
            } elseif($request->date_start != null && $request->date_to !=null && $request->camera_id != 0) {
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
                            ->whereHas('userGroups', function($query){
                                $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                                    ->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                        $query->where('hunting_area_id', HuntingArea::where('name', 
                                                                                            Session::get('area'))
                                                                                            ->first()
                                                                                            ->id
                                                                                        );
                                });
                        });
                    })
                    ->whereDate('datum', '>=', $date_start)
                    ->whereDate('datum', '<=', $date_to)
                    ->orderBy('datum', 'desc')
                    ->paginate(20);
                    
            } elseif ($request->camera_id != 0 && $request->date_start == null && $request->date_to == null) {
                $cam_email = Camera::find($request->camera_id)->cam_email;
                $camimages = Camimage::with('camera')
                ->whereHas('camera', function($query) use ($cam_email){
                    $query->where('cam_email', $cam_email)
                        ->whereHas('userGroups', function($query){
                            $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                                ->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                    $query->where('hunting_area_id', HuntingArea::where('name', 
                                                                                        Session::get('area'))
                                                                                        ->first()
                                                                                        ->id
                                                                                    );
                            });
                    });
                })
                ->orderBy('datum', 'desc')
                ->paginate(20);
            } elseif($request->camera_id == 0 && $request->date_start == null && $request->date_to == null) {

                return redirect()->route('images.index');
            }
        }

        return view('dashboard.images', [
            'user_areas'=>$user_areas->pluck('name'),
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
        return Comment::with('user')->where('camimage_id', $id)->get();
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
    public function destroy(Request $request)
    {
        Camimage::destroy($request->delete_id);
        try{
            Activity::where('image_id', $request->delete_id)->delete();
        } catch(\Exception $e) {
            
        }

        return back()->withStatus('Image deleted successfully');
    }

    /**
     * Get image information ifrom storage.
     *
     * @return data for StatisticsChartComponent
     */
    public function chartData(Request $request){

        if($request->has('date_to')) {
            $date_start = Carbon::parse($request->date_start)
            ->toDateTimeString();
            $date_to = Carbon::parse($request->date_to)
                            ->addHours(23)
                            ->addMinutes(59)
                            ->toDateTimeString();
            $data = Camimage::whereDate('datum', '>=', $date_start)->where('datum', '<=', $date_to)->with('camera')
                ->whereHas('camera', function($query){
                    $query->whereHas('userGroups', function($query){
                        $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                        ->whereHas('hunting_areas', function($query){
                            $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                        });
                    });
                })->get()->groupBy(function($date) {
                    return Carbon::parse($date->datum)->format('d-m-Y');
                }) ->sortBy(function($value, $key){
                    return $key;
                });
            } else {
                $data = Camimage::with('camera')
                ->whereHas('camera', function($query){
                    $query->whereHas('userGroups', function($query){
                        $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'))
                        ->whereHas('hunting_areas', function($query){
                            $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                        });
                    });
                })->get()->groupBy(function($date) {
                    return Carbon::parse($date->datum)->format('m-Y');
                }) ->sortBy(function($value, $key){
                    return $key;
                });
            }
            
        $count = [];
        $i =0;
        foreach($data as $k=>$img) {
            $count[$i]=$img->count();
            $i++;
        }

        return [
            'labels' => $data->keys(),
            'datasets' => array([
                'label' => 'Count images',
                'backgroundColor'=> '#83ba2d',
                'data' => $count,
            ])
      ];
    }

    /**
     * forward image via email.
     *
     * @return void
     */
    public function froward_image(Request $request)
    {
        try {
            Mail::to($request->email)->send(new ForwardImage($request));
        } catch(\Exception $e) {
            //
        }
        return back()->withStatus('Email sent successfully');
    }

}
