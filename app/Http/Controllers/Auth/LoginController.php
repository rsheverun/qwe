<?php

namespace App\Http\Controllers\Auth;

use App\UserGroup;
use App\HuntingArea;
use Auth;
use Session;
use Spatie\Permission\Models\Role;


use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticated($user)
    {
        Auth::user()->last_login = Carbon::now()->toDateTimeString();
        Auth::user()->save();
        $user_areas = HuntingArea::with('userGroups')->whereHas('userGroups', function($query){
            $query->whereIn('user_group_id', auth()->user()->usergroups->pluck('id'));
                
        })->get();
        Session::put(['area'=> $user_areas->first()->name]);
        // $role = HuntingArea::where('name',$user_areas->first()->name)->first()->userGroups()->with('hunting_areas')->whereHas('hunting_areas', function ($query) {
        //     $query->with('userGroups')->whereHas('userGroups', function ($query) {
        //         $query->with('users')->whereHas('users', function ($query) {
        //             $query->where('user_id', auth()->user()->id);
        //         });
        //     });
        // })->min('role_id');
         // })->get();
         $role= auth()->user()->usergroups()->with('hunting_areas')->whereHas('hunting_areas', function($query) use($user_areas){
            $query->where('name',$user_areas->first()->name);
        })->with('role')->get()->pluck('role')->min('id');
        Auth::user()->syncRoles(Role::find($role)->name);
    }
    
    public function username()
    {
        return 'nickname';
    }

}
