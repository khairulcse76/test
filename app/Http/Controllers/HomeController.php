<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

//     $config_items = User::all ();

        $test=auth()->user()->role_id;
        if ($test==NULL){
            return view('welcome');
        }else{
            return view('admin.home');
        }


    }
}
