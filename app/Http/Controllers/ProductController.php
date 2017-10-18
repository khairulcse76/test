<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;
use Illuminate\Support\Facades\File;

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

//        $image = $request->file('productFile');
//        $image1 = $request->file('productFile1');
//        $image2 = $request->file('productFile2');
//        $image3 = $request->file('productFile3');
//        $imageSize = File::size($image);
//        echo "<pre>";
//        print_r($image);
//        echo $imageSize; exit();
//        $image1Size = File::size($image1);
//        $image2Size = File::size($image2);
//        $image3Size = File::size($image3);
//        if ($imageSize < 512000 || $image1Size > 512000 || $image2Size > 512000 || $image3Size > 512000){
//            session()->flash('warning', 'Image size must Less then 500 kb..!!!');
//            return back();
//        }else{
//            session()->flash('massage', 'Image size have Less then 500 kb..!!!');
//            return back();
//        }
//exit();
        $this->validate($request,[
            'subCategoryId' => 'required',
            'brandName' => 'required',
            'productName' => 'required',
            'modelNo' => 'required',
            'productPrice' => 'required',
            'quantity' => 'required',
            'minQuantity' => 'required',
        ]);
        $Cagetoryarray=$request->subCategoryId;
        $subcategoryId = implode(".", $Cagetoryarray);
//        echo $subcategoryId;
//        exit();
        $colors = $request->colorId;
        $color = implode(".", $colors);
//        echo $color;
//        exit();
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

        $image = $request->file('productFile');
        $image1 = $request->file('productFile1');
        $image2 = $request->file('productFile2');
        $image3 = $request->file('productFile3');
        $imageSize = File::size($image);
        $image1Size = File::size($image1);
        $image2Size = File::size($image2);
        $image3Size = File::size($image3);
//        if ($imageSize || $image1Size || $image2Size || $image3Size <= 512000){
//            session()->flash('warning', 'Image size must Less then 500 kb..!!!');
//            return back();
//        }
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'productPicture/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                if ($image1) {
                    $image_name1 = str_random(20);
                    $ext1 = strtolower($image1->getClientOriginalExtension());
                    $image_full_name1 = $image_name1 . '.' . $ext1;
                    $upload_path1 = 'extraPicture/';
                    $image_url1 = $upload_path1 . $image_full_name1;
                    $success1 = $image1->move($upload_path1, $image_full_name1);
                    if ($success1) {
                        if ($image2){
                            $image_name2 = str_random(20);
                            $ext2 = strtolower($image2->getClientOriginalExtension());
                            $image_full_name2 = $image_name2 . '.' . $ext2;
                            $upload_path2 = 'extraPicture/';
                            $image_url2 = $upload_path2 . $image_full_name2;
                            $success2 = $image2->move($upload_path2, $image_full_name2);
                            if ($success2){
                                if ($image3){
                                    $image_name3 = str_random(20);
                                    $ext3 = strtolower($image3->getClientOriginalExtension());
                                    $image_full_name3 = $image_name3 . '.' . $ext3;
                                    $upload_path3 = 'extraPicture/';
                                    $image_url3 = $upload_path3 . $image_full_name3;
                                    $success3 = $image3->move($upload_path3, $image_full_name3);
                                    if ($success3){
                                        $item['productFile'] = $image_url;
                                        $item['productFile1'] = $image_url1;
                                        $item['productFile2'] = $image_url2;
                                        $item['productFile3'] = $image_url3;
                                        $item->save();
                                        session()->flash('massage', 'Product Successfull Saved.');
                                        return back();
                                    }
                                }else{
                                    $item['productFile'] = $image_url;
                                    $item['productFile1'] = $image_url1;
                                    $item['productFile2'] = $image_url2;
                                    $item->save();
                                    session()->flash('massage', 'Product Successfull Saved.');
                                    return back();
                                }
                            }
                        }else{
                            $item['productFile'] = $image_url;
                            $item['productFile1'] = $image_url1;
                            $item->save();
                            session()->flash('massage', 'Product Successfull Saved.');
                            return back();
                        }
                    }
                } else{
                    $item['productFile'] = $image_url;
                    $item->save();
                    session()->flash('massage', 'Product Successfull Saved.');
                    return back();
                }
            }
        }
        else{
            $item->save();
            session()->flash('massage', 'Product Successfull Saved.');
            return back();
        }
//        $success=$item->save();
//        if ($success){
//            session()->flash('massage', 'Product Successfull Saved.');
//        }
//        return back();
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
