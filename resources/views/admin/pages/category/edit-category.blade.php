@extends('admin.layouts.admin-master')
@section('title') Admin | Category Update @endsection
@section('pageHeader') Category Update @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                {{--                @include('admin.massages.errors')--}}
                @if(session('massage'))
                    <h3 class="alert alert-success text-center">{{ session('massage') }}</h3>
                @endif
                <form action="{{url('/authorize/category-update/'.$category->id)}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" name="categoryName" id="categoryName" value="{{ $category->categoryName }}" class="form-control" placeholder="Enter Category Name" >
                        @if($errors->has('categoryName'))
                            <span style="color: red;">{{ $errors->first('categoryName') }}</span>
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