@extends('admin.layouts.admin-master')
@section('title') Admin | Create @endsection
@section('pageHeader') Brand Create @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{--displaying error message--}}
                @include('admin.massages.errors')
                {{--@if($subCategories->isEmpty())--}}
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!: Please Create a Sub Category First</strong>
                    </div>
                {{--@endif--}}
                <form action="{{url('/admin/brand')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="sub_category_id">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="sub_category_id">
                            {{--@foreach($subCategories as $subCategory)--}}
                                <option value="">select Sub category</option>
                            {{--@endforeach--}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brName">Brand Name</label>
                        <input required type="text" name="BrandName" id="brName" class="form-control" placeholder="Brand Name" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection