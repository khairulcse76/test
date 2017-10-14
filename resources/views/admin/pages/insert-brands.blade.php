@extends('admin.layouts.admin-master')
@section('title') Admin | Create @endsection
@section('pageHeader') Brand Create @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
{{--                @include('admin.massages.errors')--}}
                @if($subCategories->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Sub Category First</strong>
                    </div>
                @endif
                @if(session('massage'))
                    <h3 class="alert alert-success text-center">{{ session('massage') }}</h3>
                @endif
                <form action="{{url('/authorize/brand-store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="subCategoryId">Sub Category</label>
                        <select class="form-control" name="subCategoryId" id="subCategoryId">
                            <option value="">select Sub category</option>
                            <option value="0">সব ক্যাটাগরি</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->subCategoryName }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('subCategoryId'))
                            <span style="color: red;">{{ $errors->first('subCategoryId') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="brName">Brand Name</label>
                        <input type="text" name="BrandName" id="BrandName" class="form-control" placeholder="Enter Brand Name" >
                        @if($errors->has('BrandName'))
                            <span style="color: red;">{{ $errors->first('BrandName') }}</span>
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