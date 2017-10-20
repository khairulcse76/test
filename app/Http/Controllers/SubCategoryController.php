<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;
use Redirect;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories=SubCategory::all();
        return view('admin.pages.category.manage-subCategory')->with('subCategories', $subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::get();
//        print_r($Categories); exit();
        return view('admin.pages.category.insert-sub-category', compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subCategoryName' => 'required|min:3',
            'category_id' => 'required',
        ]);

        $item = new SubCategory;
        $item->subCategoryName = $request->subCategoryName;
        $item->category_id=$request->category_id;

        $success=$item->save();
        if ($success){
            session()->flash('massage', 'Sub-Category Successfully Save');
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
        $subCategory=SubCategory::find($id);

        return view('admin.pages.category.edit-subcategory')->with('subCategory', $subCategory);
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
            'subCategoryName' => 'required|min:3',
            'category_id' => 'required',
        ]);
        $item=SubCategory::find($id);
        $item->subCategoryName = $request->subCategoryName;
        $item->category_id=$request->category_id;

        $success=$item->update();
        if ($success){
            session()->flash('massage', 'Sub-Category Successfully Update');
        }
        return redirect('/authorize/subcategory-manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);
        session()->flash('warning', 'Sub-Category Successfully Delete from record');
        return redirect('/authorize/subcategory-manage');
    }
}
