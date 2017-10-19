<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;
use Illuminate\Support\Facades\File;
use Image;

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
      //validation Start
        $this->validate($request,[
            'subCategoryId' => 'required',
            'brandName' => 'required',
            'productName' => 'required',
            'modelNo' => 'required',
            'productPrice' => 'required',
            'quantity' => 'required',
            'minQuantity' => 'required',
        ]);

        $image=$request->file('productFile');
        $image1=$request->file('productFile1');
        $image2=$request->file('productFile2');
        $image3=$request->file('productFile3');
//        $originalName= $image->getClientOriginalName();
//        $inpute=md5($originalName).time().'.'.$image->getClientOriginalExtension();
//        $destinationPath=public_path('/upload/thumbs');
//        $img= Image::make($image->getRealPath());
//        $img->resize(100, 70, function ($constraint){
//            $constraint->aspectRatio();
//        })->save($destinationPath.'/'.$inpute);
//        $destinationPath2=public_path('/upload/homepicture/');
//        $img2= Image::make($image->getRealPath());
//        $img2->resize(268, 249, function ($constraint){
//            $constraint->aspectRatio();
//        })->save($destinationPath2.'/'.$inpute);
//        $destinationPath='/upload';
//        $image_url=$destinationPath.'/'.$inpute;
//        $success=$image->move($destinationPath, $inpute);

//        if ($success){ echo 'Move success'.$imgurl; }; exit();

        if ($image){
            $this->validate($request,[
                'productFile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
        }elseif ($image1){
            $this->validate($request,[
                'productFile1' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
        }elseif ($image2){
            $this->validate($request,[
                'productFile2' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
        }elseif ($image3){
            $this->validate($request,[
                'productFile3' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
        }
    //validation End


        $Cagetoryarray=$request->subCategoryId;
        $subcategoryId = implode(".", $Cagetoryarray);
        $colors = $request->colorId;
        $color = implode(".", $colors);
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

        if ($image) {
            $originalName= $image->getClientOriginalName();
            $inpute=md5($originalName).time().'.'.$image->getClientOriginalExtension();
            $destinationPaththumbs=public_path('/upload/thumbs');
            $imgthumbs= Image::make($image->getRealPath());
            $imgthumbs->resize(100, 70, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPaththumbs.'/'.$inpute);
            $destinationPathhomepicture=public_path('/upload/homepicture/');
            $imghomepicture= Image::make($image->getRealPath());
            $imghomepicture->resize(268, 249, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathhomepicture.'/'.$inpute);
            $destinationPathProductDetails=public_path('/upload/productDetails/');
            $imgproductDetails= Image::make($image->getRealPath());
            $imgproductDetails->resize(300, 330, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathProductDetails.'/'.$inpute);
            $destinationPathUpload=public_path('/upload');
            $image_url=$inpute;
            $success=$image->move($destinationPathUpload, $inpute);
            if ($success){
                   if ($image1){
                       $originalName1= $image1->getClientOriginalName();
                       $inpute1=md5($originalName1).time().'.'.$image1->getClientOriginalExtension();
                       //resize 1
                       $destinationPaththumbs1=public_path('/upload/thumbs');
                       $imgthumbs1= Image::make($image1->getRealPath());
                       $imgthumbs1->resize(100, 70, function ($constraint){
                           $constraint->aspectRatio();
                       })->save($destinationPaththumbs1.'/'.$inpute1);
                       //resize 2
                       $destinationPathhomepicture1=public_path('/upload/homepicture/');
                       $imghomepicture1= Image::make($image1->getRealPath());
                       $imghomepicture1->resize(268, 249, function ($constraint){
                           $constraint->aspectRatio();
                       })->save($destinationPathhomepicture1.'/'.$inpute1);
                       //resize 3
                       $destinationPathProductDetails1=public_path('/upload/productDetails/');
                       $imgproductDetails1= Image::make($image1->getRealPath());
                       $imgproductDetails1->resize(300, 330, function ($constraint){
                           $constraint->aspectRatio();
                       })->save($destinationPathProductDetails1.'/'.$inpute1);

                       $destinationPathUpload1=public_path('/upload');
                       $image_url1=$inpute1;
                       $success1=$image1->move($destinationPathUpload1, $inpute1);
                       if ($success1){
                           if ($image2){
                               $originalName2= $image2->getClientOriginalName();
                               $inpute2=md5($originalName2).time().'.'.$image2->getClientOriginalExtension();
                               $destinationPaththumbs2=public_path('/upload/thumbs');
                               $imgthumbs2= Image::make($image2->getRealPath());
                               $imgthumbs2->resize(100, 70, function ($constraint){
                                   $constraint->aspectRatio();
                               })->save($destinationPaththumbs2.'/'.$inpute);
                               $destinationPathhomepicture2=public_path('/upload/homepicture/');
                               $imghomepicture2= Image::make($image2->getRealPath());
                               $imghomepicture2->resize(268, 249, function ($constraint){
                                   $constraint->aspectRatio();
                               })->save($destinationPathhomepicture2.'/'.$inpute2);
                               $destinationPathProductDetails2=public_path('/upload/productDetails/');
                               $imgproductDetails2= Image::make($image2->getRealPath());
                               $imgproductDetails2->resize(300, 330, function ($constraint){
                                   $constraint->aspectRatio();
                               })->save($destinationPathProductDetails2.'/'.$inpute2);
                               $destinationPathUpload2=public_path('/upload');
                               $image_url2=$inpute2;
                               $success2=$image2->move($destinationPathUpload2, $inpute2);
                               if ($success2){
                                   if ($image3){
                                       $originalName3= $image3->getClientOriginalName();
                                       $inpute3=md5($originalName3).time().'.'.$image3->getClientOriginalExtension();
                                       $destinationPaththumbs3=public_path('/upload/thumbs');
                                       $imgthumbs3= Image::make($image3->getRealPath());
                                       $imgthumbs3->resize(100, 70, function ($constraint){
                                           $constraint->aspectRatio();
                                       })->save($destinationPaththumbs3.'/'.$inpute3);
                                       $destinationPathhomepicture3=public_path('/upload/homepicture/');
                                       $imghomepicture3= Image::make($image3->getRealPath());
                                       $imghomepicture3->resize(268, 249, function ($constraint){
                                           $constraint->aspectRatio();
                                       })->save($destinationPathhomepicture3.'/'.$inpute3);

                                       $destinationPathProductDetails3=public_path('/upload/productDetails/');
                                       $imgproductDetails3= Image::make($image3->getRealPath());
                                       $imgproductDetails3->resize(300, 330, function ($constraint){
                                           $constraint->aspectRatio();
                                       })->save($destinationPathProductDetails3.'/'.$inpute3);
                                       $destinationPathUpload3=public_path('/upload');
                                       $image_url3=$inpute3;
                                       $success3=$image3->move($destinationPathUpload3, $inpute3);
                                       if ($success3){
                                           $item['productFile'] = $image_url;
                                           $item['productFile1'] = $image_url1;
                                           $item['productFile2'] = $image_url2;
                                           $item['productFile3'] = $image_url3;
                                           $item->save();
                                           session()->flash('massage', 'Product Successfully Saved.');
                                           return back();
                                       }
                                   }else{
                                       $item['productFile'] = $image_url;
                                       $item['productFile1'] = $image_url1;
                                       $item['productFile2'] = $image_url2;
                                       $item->save();
                                       session()->flash('massage', 'Product Successfully Saved.');
                                       return back();
                                   }
                               }
                           }else{
                               $item['productFile'] = $image_url;
                               $item['productFile1'] = $image_url1;
                               $item->save();
                               session()->flash('massage', 'Product Successfully Saved.');
                               return back();
                           }
                       }
                   }else{
                       $item['productFile'] = $image_url;
                       $item->save();
                       session()->flash('massage', 'Product Successfully Saved.');
                       return back();
                   }
                }

        }else{
            $item->save();
            session()->flash('massage', 'Product Successfully Saved.');
            return back();
        }

    }
//
//if ($image1) {
//$originalName= $image1->getClientOriginalName();
//$inpute=md5($originalName).time().'.'.$image1->getClientOriginalExtension();
//$destinationPath=public_path('/upload/thumbs');
//$img= Image::make($image1->getRealPath());
//$img->resize(100, 70, function ($constraint){
//    $constraint->aspectRatio();
//})->save($destinationPath.'/'.$inpute);
//$destinationPath2=public_path('/upload/homepicture/');
//$img2= Image::make($image->getRealPath());
//$img2->resize(268, 249, function ($constraint){
//    $constraint->aspectRatio();
//})->save($destinationPath2.'/'.$inpute);
//$destinationPath='/upload';
//$image_url1=$destinationPath.'/'.$inpute;
//$success1=$image->move($destinationPath, $inpute);
//if ($success1) {
//if ($image2){
//$originalName= $image2->getClientOriginalName();
//$inpute=md5($originalName).time().'.'.$image2->getClientOriginalExtension();
//$destinationPath=public_path('/upload/thumbs');
//$img= Image::make($image2->getRealPath());
//$img->resize(100, 70, function ($constraint){
//    $constraint->aspectRatio();
//})->save($destinationPath.'/'.$inpute);
//$destinationPath2=public_path('/upload/homepicture/');
//$img2= Image::make($image->getRealPath());
//$img2->resize(268, 249, function ($constraint){
//    $constraint->aspectRatio();
//})->save($destinationPath2.'/'.$inpute);
//$destinationPath='/upload';
//$image_url2=$destinationPath.'/'.$inpute;
//$success2=$image->move($destinationPath, $inpute);
//if ($success2){
//if ($image3){
//$originalName= $image2->getClientOriginalName();
//$inpute=md5($originalName).time().'.'.$image2->getClientOriginalExtension();
//$destinationPath=public_path('/upload/thumbs');
//$img= Image::make($image2->getRealPath());
//$img->resize(100, 70, function ($constraint){
//    $constraint->aspectRatio();
//})->save($destinationPath.'/'.$inpute);
//$destinationPath2=public_path('/upload/homepicture/');
//$img2= Image::make($image->getRealPath());
//$img2->resize(268, 249, function ($constraint){
//    $constraint->aspectRatio();
//})->save($destinationPath2.'/'.$inpute);
//$destinationPath='/upload';
//$image_url3=$destinationPath.'/'.$inpute;
//$success3=$image->move($destinationPath, $inpute);
//if ($success3){
//$item['productFile'] = $image_url;
//$item['productFile1'] = $image_url1;
//$item['productFile2'] = $image_url2;
//$item['productFile3'] = $image_url3;
//$item->save();
//session()->flash('massage', 'Product Successfull Saved.');
//return back();
//}
//}else{
//    $item['productFile'] = $image_url;
//    $item['productFile1'] = $image_url1;
//    $item['productFile2'] = $image_url2;
//    $item->save();
//    session()->flash('massage', 'Product Successfull Saved.');
//    return back();
//}
//}
//}else{
//    $item['productFile'] = $image_url;
//    $item['productFile1'] = $image_url1;
//    $item->save();
//    session()->flash('massage', 'Product Successfull Saved.');
//    return back();
//}
//}
//} else{
//    $item['productFile'] = $image_url;
//    $item->save();
//    session()->flash('massage', 'Product Successfull Saved.');
//    return back();
//}
    public function productDetails($id)
    {
        $product=Product::find($id);

//        print_r($product); exit();
//            Product::w('id', $id)->get();
//        ModelName::where('name_id', $id)->get();
//        where('id', $id)->get();

        return view('pages.productDetails')->with('product', $product);

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

    public function imageupload($image){
        $originalName= $image->getClientOriginalName();
        $inpute=md5($originalName).time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/upload/thumbs');
        $destinationPath2=public_path('/upload/home');
        $imgthumbs= Image::make($image->getRealPath());
        $imghome= Image::make($image->getRealPath());
        $imgthumbs->resize(100, 70, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$inpute);
        $imghome->resize(268, 249, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath2.'/'.$inpute);
        $destinationPath=public_path('/upload');
        $img_url=$destinationPath.$inpute;
        $image->move($destinationPath, $inpute);
    }



    public function image(){
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
    }
}

