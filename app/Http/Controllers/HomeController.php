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
        $this->middleware(['auth','isVerified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.index');
    }
    public function chartData(){
        return [
            'labels' => ['January', 'February', 'March', 'April'],
            'datasets' => array([
                'label' => 'Data One',
                'backgroundColor'=> '#e3342f',
                'data' => [40, 39, 10, 40],
            ])
      ];
    }
    public function chartPieData(){
        return [
            'labels' => ['January', 'February', 'March', 'April'],
            'datasets' => array([
                'label' => 'Data One',
                'backgroundColor'=> ['#e3342f','#ffed4a','#38c172', '#3490dc'],
                'data' => [40, 39, 10, 40],
            ])
      ];
    }

    public function change_locale(Request $request)
    {

        Session::put(['lang'=> $request->lang]);
        App::setLocale(Session::pull('language'));
        return back();

    }

    public function text(){
        return view ('text');
    }
}
