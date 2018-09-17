<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
        return view('dashboard.index');
    }

    public function cameras()
    {
        return view('dashboard.cameras');
    }
    
    public function images()
    {
        return view('dashboard.images');
    }

    public function details()
    {
        return view('dashboard.details');
    }
    
    public function settings()
    {
        $roles = Role::all();

        return view('dashboard.settings',['roles'=>$roles]);
    }

    public function account()
    {
        return view('dashboard.account');
    }
}
