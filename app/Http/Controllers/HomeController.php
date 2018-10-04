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
use App\Camera;
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
       
        $user_cameras = Camera::with('usergroups')->whereHas('usergroups', function ($query) {
                                                        $query->with('users')->whereHas('users', function ($query) {
                                                            $query->where('user_id', auth()->user()->id);
                                                        });
                                                    })
                                                    ->get();
        $count_all_images = 0;
        $count_day_images = 0;
        foreach ($user_cameras as $camera) {
            $count_all_images += Camimage::where('cam', $camera->cam_email)->get()->count();
        }
        foreach ($user_cameras as $camera) {
            $count_day_images += Camimage::where('cam', $camera->cam_email)
                                        ->where('datum', '>=', Carbon::now()->subHours(24)->toDateTimeString())
                                        ->get()
                                        ->count();
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
            'count_all_images' => $count_all_images,
            'count_day_images' => $count_day_images,
            'count_day_cameras' => $user_cameras->count()
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
    
        $role = HuntingArea::where('name', $request->area)->first()->usergroups()->with('hunting_areas')->whereHas('hunting_areas', function ($query) {
            $query->with('usergroups')->whereHas('usergroups', function ($query) {
                $query->with('users')->whereHas('users', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });
            });
        })->get();
        // dd($role);
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
