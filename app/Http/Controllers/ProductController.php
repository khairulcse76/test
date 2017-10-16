<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        echo "i am from create"; exit();

        return view('admin.insert-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Cagetoryarray=$request->subCategoryId;
        $subcategoryId = implode(",", $Cagetoryarray);
        echo $subcategoryId;
        exit();
        $colors = $request->colorId;
        $color = implode(",", $colors);
        echo $color;
//        exit();

        $this->validate($request,[
            'subCategoryId' => 'required',
            'brandName' => 'required',
            'productName' => 'required',
            'modelNo' => 'required',
            'productPrice' => 'required',
            'quantity' => 'required',
            'minQuantity' => 'required',
        ]);


        $item = new Product;

        $unique=Product::all();
        $ModelName=strtolower($request->modelNo);
        foreach ($unique as $value){
            if ($value->modelNo == ucfirst($ModelName)){
                session()->flash('warning', 'Model Number already exist..!!!');
                return back();
            }
        }

        $item->subCategoryId = $subcategoryId;
        $item->colorId = $color;
        $item->brandName = $request->brandName;
        $item->productName = $request->productName;
        $item->modelNo = ucfirst($ModelName);
        $item->productDescription = $request->productDescription;
        $item->productPrice = $request->productPrice;
        $item->productPrice = $request->productPrice;
        $item->quantity = $request->quantity;
        $item->minQuantity = $request->minQuantity;
        $item->availability = $request->availability;
        $item->condition = $request->condition;
        $item->condition = $request->condition;

        $success=$item->save();
        if ($success){
            session()->flash('massage', 'Product Successfull Saved.');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
