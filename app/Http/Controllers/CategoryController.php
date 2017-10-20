<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
//            DB::table('brands')
//            ->join('sub_categories', 'brands.subCategoryId', '=', 'sub_categories.id')
//            ->select('brands.*', 'sub_categories.subCategoryName')
//            ->get();

        return view('admin.pages.category.manage-category')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.insert-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsess
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'categoryName' => 'required',
        ]);

        $item = new Category;

        $item->categoryName = $request->categoryName;
        $item->user_id=auth()->user()->id;
        $success=$item->save();
        if ($success){
            session()->flash('massage', 'Category Successfully Save....!');
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
        $category = Category::find($id);

        return view('admin.pages.category.edit-category')->with('category', $category);
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
            'categoryName' => 'required',
        ]);

        $item = Category::find($id);

        $item->categoryName = $request->categoryName;
        $item->user_id=auth()->user()->id;
        $success=$item->update();
        if ($success){
            session()->flash('massage', 'Category Successfully Updated....!');
        }
        return redirect('authorize/manage-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::destroy($id);
        if ($category){
            session()->flash('warning', 'Category Successfully Deleted.....');
        }
        return redirect('authorize/manage-category');
    }
}
