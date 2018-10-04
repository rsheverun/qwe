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
        $cameras = collect();
        $Camimage = new Camimage;
        $Camimage->setConnection('camportal');
        foreach (Auth::user()->usergroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area)
            $user_areas->push($area->name);
        }
        
    
            // $img = Camimage::with('camera')
            // ->whereHas('camera', function($query){
            //     $query->with('usergroups')->whereHas('usergroups', function($query){
            //         $query->with('hunting_areas')->whereHas('hunting_areas', function($query){
            //             $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
            //         });
            //     });
            // })->get();

            
            // $img = Camimage::with('camera')
            //     ->whereHas('camera', function($query){
            //         $query->where('id', 1);
            //     })
            //     ->get();
            // dd($img);
            $cameras = Camera::with('usergroups')->whereHas('usergroups', function($query){
                $query->with('hunting_areas ')->whereHas('hunting_areas', function($query){
                    $query->where('hunting_area_id', HuntingArea::where('name', Session::get('area'))->first()->id);
                });
            })->get();


  
            // dd($cameras);
            $camimages = Camimage::all();
            $img = collect();
            foreach($cameras as $camera) {
                foreach($camimages as $image) {
                    if($camera->cam_email == $image->cam) {
                        $img->push($image);
                    }
                }
            }
        if ($request->has('filter1')) {
            $date_start = Carbon::parse($request->date_start)
                                ->toDateTimeString();
            $date_to = Carbon::parse($request->date_to)
                                ->addHours(23)
                                ->addMinutes(59)
                                ->toDateTimeString();
            // $user_cameras = Camera::with('usergroups')
            //         ->whereHas('usergroups', function ($query) {
            //                                             $query->with('users')->whereHas('users', function ($query) {
            //                                                 $query->where('user_id', auth()->user()->id);
            //                                             });
            //                                         })
            //         ->get();
            $camera = Camera::find($request->camera_id);
            
            $camimages = $Camimage->where('cam', $camera->cam_email)->paginate(20);
            dd($camimages);
        }
        else {
            return view('dashboard.images', [
                'user_areas'=>$user_areas,
                'cameras'=> $cameras,
            ]);
        }
        
    }
}
