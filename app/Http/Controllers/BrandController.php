<?php

namespace App\Http\Controllers;

use App\brand;
use App\SubCategory;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        $subCategories=SubCategory::get();
        return view('admin.pages.insert-brands', compact('subCategories'));
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
