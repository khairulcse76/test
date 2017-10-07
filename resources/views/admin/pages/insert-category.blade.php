@extends('admin.layouts.admin-master')
@section('title') Admin | Category Create @endsection
@section('pageHeader') Category Create @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                @include('admin.massages.errors')
                {{--@if($subCategories->isEmpty())--}}
                {{--<div class="alert alert-warning" role="alert">--}}
                    {{--<strong>Warning!: Please Create a Sub Category First</strong>--}}
                {{--</div>--}}
                {{--@endif--}}
                <form action="{{url('/authorize/category-store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="brName">Category Name</label>
                        <input required type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Enter Category Name" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection