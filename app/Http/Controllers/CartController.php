<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
        $carts= DB::table('products')->where('id', $request->product_id)->first();
        $data['id']=$carts->modelNo;
        $data['name']=$carts->productName;
        $data['qty']=$request->qty;
        $data['price']=$carts->productPrice;
        $data['options']['image']=$carts->productFile;
        Cart::add($data);
        session()->flash('massage', "$carts->productName successfully added to your shopping bag.");
        return back();
    }
    public function show_cart(){

        return view('pages.show-cart');
    }
    public function remove_to_cart($id){

        Cart::update($id, 0);
        return redirect('show-cart/');
    }
    public function increment($id){
        foreach(Cart::content() as $row) {
            if ($row->rowId==$id){
               $value= $row->qty+1;
            }
        }
        Cart::update($id, $value);
        return redirect('show-cart/');
    }
    public function decrement($id){

            foreach(Cart::content() as $row) {
                if ($row->rowId==$id){
                    if ($row->qty==1){
                        session()->flash('warning', 'Minimum Required Quantity = 1');
                        $value= 1;
                    }else{
                        $value= $row->qty-1;
                    }
                }
            }
        Cart::update($id, $value);
        return redirect('show-cart/');
    }
}
