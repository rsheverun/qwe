<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\HuntingArea;
use Session;
use App\Camimage;
use App\Camera;
use Carbon\Carbon;
class ImagesController extends Controller
{
    public function index(Request $request)
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
                    $query->with('hunting_areas')->whereHas('hunting_areas', function($query){
                        $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                    });
                });
            })->paginate(20);
            
           
        $user_cameras = Camera::with('userGroups')
            ->whereHas('userGroups', function ($query) {
                                                $query->with('users')->whereHas('users', function ($query) {
                                                    $query->where('user_id', auth()->user()->id);
                                                });
                                            })
            ->get();
        if ($request->has('filter')) {
            
            if ($request->has('date_start') && $request->has('date_to') && $request->has('camera_id') == false) {
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
                ->paginate(20);
            } elseif($request->has('date_start') && $request->has('date_to') && $request->camera_id == 0) {
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
                ->paginate(20);
            } elseif ($request->camera_id != 0 && $request->has('date_start') == false && $request->has('date_to') == false) {
                $camimages = Camimage::with('camera')
                ->whereHas('camera', function($query){
                    $query->where('cam_email', $cam_email)
                        ->with('userGroups')
                        ->whereHas('userGroups', function($query){
                            $query->with('hunting_areas')->whereHas('hunting_areas', function($query){
                                $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                            });
                    });
                })
                ->paginate(20);
            }
        }
        return view('dashboard.images', [
            'user_areas'=>$user_areas,
            'cameras'=> $user_cameras,
            'camimages' => $camimages
        ]); 
            
        
        
    }
}
