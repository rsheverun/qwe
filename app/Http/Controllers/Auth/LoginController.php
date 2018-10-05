<?php

namespace App\Http\Controllers\Auth;

use App\UserGroup;
use Auth;
use Session;

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
         $hunting_areas = collect();
        $user_areas = collect();
        foreach (auth()->user()->userGroups as $group) {
            $hunting_areas->push($group->hunting_areas);
        }
        foreach ($hunting_areas as $hunting_area){
           foreach ($hunting_area as $area) {
            $user_areas->push($area->name);
           }
        }
        Session::put(['area'=> $user_areas[0]]);
    }
    
    public function username()
    {
        return 'nickname';
    }

}
