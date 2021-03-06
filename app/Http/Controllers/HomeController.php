<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::role('group2')->get());
        return view('home');
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
}
