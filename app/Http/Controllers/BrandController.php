<?php

namespace App\Http\Controllers;

use App\brand;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;
use Redirect;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::all();
//            DB::table('brands')
//            ->join('sub_categories', 'brands.subCategoryId', '=', 'sub_categories.id')
//            ->select('brands.*', 'sub_categories.subCategoryName')
//            ->get();

        return view('admin.pages.brand.manage-brand')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories=SubCategory::get();
        return view('admin.pages.brand.insert-brands', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'BrandName' => 'required',
            'subCategoryId' => 'required',
        ]);
        $item = new brand;
        $item->BrandName = $request->BrandName;
        $item->subCategoryId=$request->subCategoryId;

        $success=$item->save();
        if ($success){
            session()->flash('massage', 'Brand Successfully Save.....');
        }
        return back();
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
        $brands = brand::find($id);

        return view('admin.pages.brand.edit-brand')->with('brands', $brands);
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
        $this->validate($request,[
            'BrandName' => 'required|min:2',
            'subCategoryId' => 'required',
        ]);
        $item = brand::find($id);
        $item->BrandName = $request->BrandName;
        $item->subCategoryId=$request->subCategoryId;

        $success=$item->update();
        if ($success){
            session()->flash('massage', 'Brand Successfully Updated.....');
        }
        return redirect('authorize/manage-brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=brand::destroy($id);

        if ($brand){
            session()->flash('warning', 'Brand Successfully Deleted.....');
        }
        return redirect('authorize/manage-brand');
    }
}
