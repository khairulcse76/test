<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
        $carts= DB::table('products')->where('id', $request->product_id)->first();
        $data['id']=$carts->id;
        $data['name']=$carts->productName;
        $data['qty']=$request->qty;
        $data['price']=$carts->productPrice;
        $data['options']['image']=$carts->productFile;
        Cart::add($data);
//        Cart::destroy();
        return redirect('/show-cart');
    }
    public function show_cart(){

        return view('pages.show-cart');
    }
}
