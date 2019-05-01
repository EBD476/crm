<?php

namespace App\Http\Controllers;

use App\AllModules;
use App\HomeData;
use App\Places;
use App\Room;
use App\User;
use http\Env\Request;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $home_data = HomeData::select('home_data','device_code')
                                ->where('device_code',Auth::user()->device_id)                                   
                                ->first();
        $places = Places::$rooms;

        if ($home_data != null){
            $home_data = json_decode($home_data->home_data)->rooms;
            AllModules::setJsonModule($home_data);
        } else {
            $home_data =  json_decode('{"rooms" : []}')->rooms;
        }
        return view('home' , ['homeData'=> $home_data,'rooms'=>$places]);
    }
}
