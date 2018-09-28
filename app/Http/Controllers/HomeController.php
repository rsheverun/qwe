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

    public function index()
    {
        $data = collect();
        // $camimages = Camimage::orderBy('datum', 'asc')->get();
        // $cameras = UserGroup::find(Auth::user()->group_id)
        //                 ->cameras()
        //                 ->get();
        // dd($cameras[0]->camimages()->get());
        $hunting_areas = collect();
        $user_areas = collect();
        foreach (Auth::user()->usergroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area)
            $user_areas->push($area->name);
        }
        
        return view('dashboard.index',[
            'data'=>$data,
            'user_areas'=>$user_areas->unique()
            ]);
    }

    public function change_area(Request $request)
    {
        Session::put(['area'=> $request->area]);
        // $groups =  HuntingArea::where('name',$request->area)->first()
        //                         ->usergroups;
        // $groups = auth()->user()->usergroups->whereHas('hunting_areas', function($query){
        //     return $query->where('name',$request->area );
        // });
        // $groups = UserGroup::hunting_areas()->where('name',$request->area);

        // if($groups->count() >1 ) {
        //     $roles = [];
        //     foreach ($groups as $k=>$group) {
        //         $roles[$k] = $group->role->name;
        //     }
        // }  
                        // ->whereHas('usergroups', function($query){
                        //     return $query->where('user_id', auth()->user()->id);
                        // })
                        // ->get());
    
        
// dd($groups);

        return back();
    }

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
