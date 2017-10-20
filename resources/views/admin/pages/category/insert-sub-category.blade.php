@extends('admin.layouts.admin-master')
@section('title') Admin | Sub|Category Create @endsection
@section('pageHeader') Sub Category Create @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                @if($Categories->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    <strong>Warning!: Please Create a Category First</strong>
                </div>
                @endif
                    @if(session('massage'))
                        <h3 class="alert alert-success text-center">{{ session('massage') }}</h3>
                    @endif
                    <form action="{{url('/authorize/sub-category-store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control" name="category_id" id="category_id" selected="{{ old('category_id')}}">
                            <option value="">Select Category</option>
                            <option value="0">সব ক্যাটাগরি</option>
                            @foreach($Categories as $category)
                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <span style="color: red;">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="brName">Sub Category Name</label>
                        <input type="text" name="subCategoryName" value="{{ old('subCategoryName') }}" class="form-control" placeholder="Enter Category Name" >
                        @if($errors->has('subCategoryName'))
                            <span style="color: red;">{{ $errors->first('subCategoryName') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection