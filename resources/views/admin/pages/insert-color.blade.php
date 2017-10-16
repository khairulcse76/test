@extends('admin.layouts.admin-master')
@section('title') Admin | Create Color @endsection
@section('pageHeader') Color @endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                @if(session('massage'))
                    <h3 class="alert alert-success text-center">{{ session('massage') }}</h3>
                @endif
                    @if(session('warning'))
                    <h3 class="alert alert-warning text-center">{{ session('warning') }}</h3>
                @endif
                <form action="{{url('/authorize/color-store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="brName">Color Name</label>
                        <input type="text" name="colorName" id="colorName" class="form-control" placeholder="Enter Color Name" >
                        @if($errors->has('colorName'))
                            <span style="color: red;">{{ $errors->first('colorName') }}</span>
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