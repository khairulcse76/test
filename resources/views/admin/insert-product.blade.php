@extends('admin.layouts.admin-master')
@section('title') Admin | Create Product @endsection
@section('pageHeader') Product Create @endsection
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
@section('main_content')
    <div class="col-md-2"> </div>
    <div class="col-md-8">
        <form class="form-horizontal" action="{{ URL::to('/') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
        <div class="box box-info">
            <div class="box-footer">
                <a href="{{ URL::to('#') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">S a v e</button>
            </div>
            @if(session('massage'))
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="alert-success" style="font-size: large; padding: 2px;"><center>{{ session('massage') }}</center></div>
                    </div>
                </div><hr>
            @endif
            @if(session('errors'))
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="alert-danger" style="font-size: large; padding: 2px;"><center>(*) are Required</center></div>
                    </div>
                </div><hr>
            @endif
            <div class="box-header with-border">
                <h2 class="box-title">একটি নতুন পণ্য যোগ করুন </h2>
            </div>
            <div class="box-header with-border">
                <h2 class="box-title">সাধারণ তথ্য </h2>
            </div>
            <div class="box-body">
            <div class="form-group">
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" ব্যাগের নাম">
                    @if($errors->has('admin_name'))
                        <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                    @endif
                </div>
            </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <div class="box-header">
                            <h3 class="box-title">পণ্যের বিবরণ</h3>
                        </div>
                        <form>
                            <textarea name="long_description"  id="long_description" class="textarea" placeholder="পণ্যের বিস্তারিত বর্ণনা "
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            </textarea>
                        </form>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h2 class="box-title">গুরুত্ব পূর্ণ তথ্য </h2>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" পণ্যের মডেল নাম্বার">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder="পণ্যের মূল্য">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder="পণ্যের পণ্যের পরিমাণ">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder="মিনিমাম সংখ্যা">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="box-header with-border">
                    <h2 class="box-title">লিংক </h2>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <select class="form-control select2">
                            <option selected="selected">ব্র্যান্ড নাম</option>
                            <option>Alaska</option>
                            <option disabled="disabled">California (disabled)</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <select class="form-control select2">
                            <option selected="selected">ক্যাটাগরি</option>
                            <option>Alaska</option>
                            <option disabled="disabled">California (disabled)</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="box-header with-border">
                    <h2 class="box-title">অপশন </h2>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <select class="form-control select2" multiple="multiple" data-placeholder="পণ্যের কালার/ রং "
                                style="width: 100%; color: #00a157;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" পণ্যের সাইজ">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="box-header with-border">
                    <h2 class="box-title">পণ্যের ছবি </h2>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="file" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" পণ্যের রং">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
            <div class="box-header with-border">
                    <h2 class="box-title">অনন্যা ছবি সমূহ</h2>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="file" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" পণ্যের রং">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="file" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" পণ্যের রং">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="file" class="form-control" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" placeholder=" পণ্যের রং">
                        @if($errors->has('admin_name'))
                            <span style="color:red;">{{ $errors->first('admin_name') }}</span>
                        @endif
                    </div>
                </div>

            <div class="box-footer">
                <a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">S a v e</button>
            </div>
        </div>

        </form>


    </div>
    <div class="col-md-2">   </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/all.css"') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @endsection
@section('script')
    <script src="{{ asset('admin/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <script src="{{ asset('admin/dist/js/moment.min.js') }}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
    @endsection