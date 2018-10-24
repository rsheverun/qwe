<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Camimage;
use App\UserGroup;
use App\HuntingArea;
use App\Activity;
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

        // Cahnge area
        $user_areas = HuntingArea::with('userGroups')->whereHas('userGroups', function($query){
            $query->whereIn('user_group_id', auth()->user()->userGroups->pluck('id'));
        })->get();
        
        //statistics
        $user_cameras = Camera::whereHas('userGroups', function($query) {
                $query->whereHas('users', function($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->whereHas('hunting_areas', function($query) {
                    $query->where('name', Session::get('area'));
                });
        })->with('camImages')->get();
        $count_all_images = 0;
        $count_day_images = 0;
        foreach ($user_cameras as $camera) {
            $count_all_images += Camimage::where('cam', $camera->cam_email)->get()->count();
        }
        foreach ($user_cameras as $camera) {
            $count_day_images += Camimage::where('cam', $camera->cam_email)
                                        ->whereDate('datum', '>=', Carbon::now()->subHours(24)->toDateTimeString())
                                        ->get()
                                        ->count();
        }

        //activity stream
        $cameras = Camera::whereHas('userGroups', function($query){
            $query->whereHas('users', function($query){
                $query->where('user_id', auth()->user()->id);
            });
        })->get();
        $activity = Activity::whereIn('camera_id', $user_cameras->pluck('id'))
                            ->orWhereIn('image_id', $user_cameras->pluck('camImages')
                                                                ->collapse()
                                                                ->pluck('id')
                                        )
                            ->orderBy('date', 'desc')
                            ->paginate(20);
        
        return view('dashboard.index',[
            'data' => $activity,
            'user_areas' => $user_areas->pluck('name'),
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
        $role= auth()->user()->usergroups()->whereHas('hunting_areas', function($query) use($request){
            $query->where('name',$request->area);
        })->with('role')->get()->pluck('role')->min('id');
        auth()->user()->syncRoles(Role::find($role)->name);

        return back();
    }
}
