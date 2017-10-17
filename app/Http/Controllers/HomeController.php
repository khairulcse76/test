<?php

namespace App\Http\Controllers;

use App\Product;
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
        $product=Product::all();


        $test=auth()->user()->role_id;
        if ($test==NULL){
            return view('welcome', compact('product'));
        }else{
            return view('admin.home');
        }
    }
    public function productDetails($id)
    {
        $product=Product::find($id);

//        print_r($product); exit();
//            Product::w('id', $id)->get();
//        ModelName::where('name_id', $id)->get();
//        where('id', $id)->get();

        return view('pages.productDetails')->with('product', $product);

    }
}
