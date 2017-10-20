@extends('admin.layouts.admin-master')
@section('title') Admin | Sub|Category Update @endsection
@section('pageHeader') Sub Category Update @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                @if(session('massage'))
                    <h3 class="alert alert-success text-center">{{ session('massage') }}</h3>
                @endif
                <form action="{{url('/authorize/update-subcategory/'.$subCategory->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <?php $Categories=DB::table('categories')->get(); ?>
                        <label for="category_id">Category Name</label>
                        <select class="form-control" name="category_id" id="category_id" selected="{{ old('category_id')}}">
                            <option value="">Select Category</option>
                            <option @if($subCategory->subCategoryId==0) selected @endif value="0">সব ক্যাটাগরি</option>
                            @foreach($Categories as $category)
                                <option @if($subCategory->subCategoryId == $category->id) selected @endif value="{{$category->id}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <span style="color: red;">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="brName">Sub Category Name</label>
                        <input type="text" name="subCategoryName" value="{{$subCategory->subCategoryName, old('subCategoryName') }}" class="form-control" placeholder="Enter Category Name" >
                        @if($errors->has('subCategoryName'))
                            <span style="color: red;">{{ $errors->first('subCategoryName') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <a href="{{ URL::to('/authorize/subcategory-manage') }}" class="btn btn-info" title="Back to Manage Page">Back</a>
                        <button type="submit" class="btn btn-info pull-right" title="Click to Update">Update Product</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection