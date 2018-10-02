<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Camimage;
use App\UserGroup;
use App\HuntingArea;
use Spatie\Permission\Models\Role;
use Session;
use App;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        //$this->middleware(['auth','isVerified']);
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if (Auth::user() == null) {
            
            return view('auth.login');
        }else {
            return redirect()->route('home');
        }
    }
    
    /**
     * Show the home page in dashboard.
     *
     * @return void
     */
    public function index()
    {
        $count_all_images = collect();
        $count_day_cameras = collect();
        $groups = auth()->user()->usergroups;
        foreach ($groups as $group) {
            $count_day_cameras->push($group->cameras);
            foreach ($group->cameras as $camera) {
                $count_all_images->push($camera->camimages);
                if ($camera->camimages->where('datum', '<', 
                                        Carbon::now()->subHours(24)
                                        ->toDateTimeString())->count() != 0) {
                    $count_day_cameras->push($camera);
                }
            }
        }
        // Cahnge area
        $hunting_areas = collect();
        $user_areas = collect();
        foreach (Auth::user()->usergroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area) {
           foreach ($hunting_area as $area) {
               $user_areas->push($area->name);
           }
        }
        
        return view('dashboard.index',[
            'data' => Camimage::orderBy('datum', 'desc')->get(),
            'user_areas' => $user_areas->unique(),
            'count_all_images' => $count_all_images->unique('id')->first()->count(),
            'count_day_images' => $count_all_images->unique('id')
                                                ->where('datum', '<', 
                                                Carbon::now()->subHours(24)->toDateTimeString()
                                                )
                                                ->first()
                                                ->count(),
            'count_day_cameras' => $count_day_cameras->unique('id')
                                                ->first()
                                                ->count()
            ]);
    }

    /**
     * change hunting area in dashboard.
     *
     * @return void
     */
    public function change_area(Request $request)
    {
        Session::put(['area'=> $request->area]);

        return back();
    }

    /**
     * Show page images in dashboard.
     *
     * @return void
     */
    public function images(){
        $hunting_areas = collect();
        $user_areas = collect();
        $cameras = collect();
        foreach (Auth::user()->usergroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area)
            $user_areas->push($area->name);
        }
        
        $groups = HuntingArea::where('name', Session::get('area'))
                                ->first()
                                ->usergroups()
                                ->paginate(20);
        foreach ($groups as $group) {
            foreach ($group->cameras as $camera) {
                $cameras->push($camera); 
            }
        }
        return view('dashboard.images', [
            'user_areas'=>$user_areas,
            'cameras'=> $cameras->unique('cam'),
            
        ]);
    }
}
