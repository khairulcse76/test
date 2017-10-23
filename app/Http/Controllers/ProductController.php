<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;
use Illuminate\Support\Facades\File;
use Image;
use DB;

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


    public function productedit($id)
    {
        $product=Product::find($id);
        return view('admin.pages.edit-product')->with('product', $product);
    }

    public function create()
    {
//        echo "i am from create"; exit();

        return view('admin.insert-product');
    }

    public function productManage()
    {
        $products = Product::all();
//            ->join('sub_categories', 'products.subCategoryId', '=', 'sub_categories.id')
//            ->select('products.*', 'sub_categories.subCategoryName')
//            ->get();

        return view('admin.pages.productManage')->with('products', $products);

    }

    public function productDetails($id)
    {
        $product=Product::find($id);
        return view('pages.productDetails')->with('product', $product);

    }

    public function store(Request $request)
    {
        //validation Start
        $this->validate($request,[
            'subCategoryId' => 'required',
            'colorId' => 'required',
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

        if ($image){
            $this->validate($request,[
                'productFile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $item['productFile'] = $this->imageUpload($image);
        }
        if ($image1){
            $this->validate($request,[
                'productFile1' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $item['productFile1'] = $this->imageUpload($image1);
        }
        if ($image2){
            $this->validate($request,[
                'productFile2' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $item['productFile2'] = $this->imageUpload($image2);
        }
        if ($image3){
            $this->validate($request,[
                'productFile3' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $item['productFile3'] = $this->imageUpload($image3);
        }

        $item->save();
        session()->flash('massage', 'Product Successfully Saved.');
        return back();

//        if ($image) {
//            if ($image1){
//                if ($image2){
//                    if ($image3){
//                        $item->productFile = $this->imageUpload($image);
//                        $item->productFile1 = $this->imageUpload($image1);
//                        $item->productFile2 = $this->imageUpload($image2);
//                        $item->productFile3 = $this->imageUpload($image3);
//                        $item->save();
//                        session()->flash('massage', 'Product Successfully Saved.');
//                        return back();
//                    }else{
//                        $item->productFile = $this->imageUpload($image);
//                        $item->productFile1 = $this->imageUpload($image1);
//                        $item->productFile2 = $this->imageUpload($image2);
//                        $item->save();
//                        session()->flash('massage', 'Product Successfully Saved.');
//                        return back();
//                    }
//
//                }elseif ($image3){
//                    $item->productFile = $this->imageUpload($image);
//                    $item->productFile1 = $this->imageUpload($image1);
//                    $item->productFile3 = $this->imageUpload($image3);
//                    $item->save();
//                    session()->flash('massage', 'Product Successfully Saved.');
//                    return back();
//                }else{
//                    $item->productFile = $this->imageUpload($image);
//                    $item->productFile1 = $this->imageUpload($image1);
//                    $item->save();
//                    session()->flash('massage', 'Product Successfully Saved.');
//                    return back();
//                }
//            }elseif ($image2){
//                $item->productFile = $this->imageUpload($image);
//                $item->productFile2 = $this->imageUpload($image2);
//                $item->save();
//                session()->flash('massage', 'Product Successfully Saved.');
//                return back();
//            }elseif ($image3){
//                $item->productFile = $this->imageUpload($image);
//                $item->productFile3 = $this->imageUpload($image3);
//                $item->save();
//                session()->flash('massage', 'Product Successfully Saved.');
//                return back();
//            }else{
//                $item['productFile'] = $this->imageUpload($image);
//                $item->save();
//                session()->flash('massage', 'Product Successfully Saved.');
//                return back();
//            }
//
//        }else{
//            $item->save();
//            session()->flash('massage', 'Product Successfully Saved.');
//            return back();
//        }
    }

    public function product_update(Request $request, $id)
    {
        $this->validate($request,[
            'subCategoryId' => 'required',
            'colorId' => 'required',
            'brandName' => 'required',
            'productName' => 'required',
            'modelNo' => 'required',
            'productPrice' => 'required',
            'quantity' => 'required',
            'minQuantity' => 'required',
        ]);
        $item=Product::find($id);
        $Cagetoryarray=$request->subCategoryId;
        $subcategoryId = implode(".", $Cagetoryarray);
        $colors = $request->colorId;
        $color = implode(".", $colors);
        $ModelName=strtolower($request->modelNo);
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

        $image=$request->productFile;
        $image1=$request->productFile1;
        $image2=$request->productFile2;
        $image3=$request->productFile3;

        $Oldimage=$item->productFile;
        $Oldimage1=$item->productFile1;
        $Oldimage2=$item->productFile2;
        $Oldimage3=$item->productFile3;
        if ($image){
            $this->validate($request,[
                'productFile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $this->file_delete($Oldimage);
            $item['productFile'] = $this->imageUpload($image);
        }else{
            $item->productFile=$Oldimage;
        }
        if ($image1){
            $this->validate($request,[
                'productFile1' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $this->file_delete($Oldimage1);
            $item['productFile1'] = $this->imageUpload($image1);
        }else{
            $item->productFile1=$Oldimage1;
        }
        if ($image2){
            $this->validate($request,[
                'productFile2' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);

            $this->file_delete($Oldimage2);
            $item['productFile2'] = $this->imageUpload($image2);
        }else{
            $item->productFile2=$Oldimage2;
        }
        if ($image3){
            $this->validate($request,[
                'productFile3' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:300',
            ]);
            $this->file_delete($Oldimage3);
            $item['productFile3'] = $this->imageUpload($image3);
        }else{
            $item->productFile3=$Oldimage3;
        }

        $item->update();
        session()->flash('massage', 'Product Successfully Update.');
        return redirect('authorize/manage-product');
    }


    public function add_top($id){
        DB::table('products')
            ->where('id', $id)
            ->update(['top_product' => 1]);
        return redirect('authorize/manage-product');
    }
    public function remove_to_top($id){
        DB::table('products')
            ->where('id', $id)
            ->update(['top_product' => 0]);
        return redirect('authorize/manage-product');
    }
    public function product_delete($id){
        $item=Product::find($id)->delete();

        if ($item){
            session()->flash('warning', 'Product Successfully Deleted.....');
        }
        return redirect('authorize/manage-product');
    }
    public function trash(){
        $trash=Product::onlyTrashed()->get();

        return view('admin.pages.trash.product-trash')->with('trash', $trash);
    }
    public function restore($id){
        Product::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    public function force_delete($id){
        $delete=Product::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        return back();
    }

    private function file_delete($file){
        \File::Delete('upload/'.$file, 'upload/thumbs/'.$file, 'upload/productDetails/'.$file,'upload/homepicture/'.$file, 'upload/slider_image/'.$file);
        $v=0;
        return $v;
    }

    private function imageUpload($image){
        $originalName= $image->getClientOriginalName();
        $inpute=md5($originalName).time().'.'.$image->getClientOriginalExtension();
        $destinationPaththumbs=public_path('/upload/thumbs');
        $imgthumbs= Image::make($image->getRealPath());
        $imgthumbs->resize(78, 70, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPaththumbs.'/'.$inpute);

        $destinationPathhomepicture=public_path('/upload/homepicture');
        $imghomepicture= Image::make($image->getRealPath());
        $imghomepicture->resize(268, 249, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPathhomepicture.'/'.$inpute);

        $destinationPathProductDetails=public_path('/upload/productDetails');
        $imgproductDetails= Image::make($image->getRealPath());
        $imgproductDetails->resize(300, 330, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPathProductDetails.'/'.$inpute);

        $destinationPathslider=public_path('/upload/slider_image');
        $imgslider= Image::make($image->getRealPath());
        $imgslider->resize(484, 441, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPathslider.'/'.$inpute);

        $destinationPathUpload=public_path('/upload');
        $success=$image->move($destinationPathUpload, $inpute);

        if ($success){
            return $inpute;
        }else{
            die('Image Upload Fail');
        }
    }
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

