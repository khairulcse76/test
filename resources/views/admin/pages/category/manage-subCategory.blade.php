<?php

//$subcategories=DB::table('sub_categories')->get();
?>

@extends('admin.layouts.admin-master')
@section('title') Admin | Manage Sub Category @endsection
@section('pageHeader') Subcategory Management @endsection
@section('main_content')
    <div class="col-xs-2"></div>
    <div class="col-xs-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Subcategory management</h3>
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
                @if(session('warning'))
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="alert alert-warning" style="font-size: large; padding: 2px;"><center>{{ session('warning') }}</center></div>
                        </div>
                    </div><hr>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Category Name</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $id=1 ;
                    ?>

                    @foreach($subCategories as $item)
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td style="color:red; font-size: large; ">{{ $item->subCategoryName }}</td>
                            <td>
                                <a href="{{ url('authorize/edit-subcategory/'.$item->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" title="Edit your Sub Category"></span></a>
                                <a href="" class="btn btn-info"><span class="glyphicon glyphicon-plus" title="Add to top Product"></span></a>
                                <a href="" class="btn btn-info"><span style="color:green;" class="glyphicon glyphicon-minus" title="Remove from top product"></span></a>
                                <a href="{{ url('authorize/delete-subcetegory/'.$item->id) }}" onclick="return check_delete()" class="btn btn-warning"><span class="glyphicon glyphicon-trash" title="Delete all information of SubCategory Permanently"></span></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection