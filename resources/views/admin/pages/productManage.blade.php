<?php

$subcategories=DB::table('sub_categories')->get();
?>

@extends('admin.layouts.admin-master')
@section('title') Admin | Category Create @endsection
@section('pageHeader') Category Create @endsection
@section('main_content')
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr></tr>
                            <tr>
                                <th>id</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Manufacturer </th>
                                <th>Product Image</th>
                                <th>Product Status</th>
                                <th>Action
                                    {{--<span class="pull-right btn btn-default" title="Click hare to Trashted data.."><a href="{{ url('authorize/product-trash/') }}" class=""></a></span>--}}
                                    <a href="{{ url('authorize/product-trash/') }}" class="pull-right btn btn-danger"><span class="glyphicon glyphicon-folder-close" title="Click hare to Trashted data.."></span></a>
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $id=1 ;
                            ?>

                            @foreach($products as $item)
                            <tr>
                                <td><?php echo $id++; ?></td>
                                <td>{{ $item->productName }}</td>
                                <?php
                                $subCategoryId=explode(".", $item->subCategoryId);

                                ?>
                                <td><?php foreach ($subCategoryId as $CategoroyId)
                                {
                                    foreach ($subcategories as $v_catId)
                                        {
                                            if ($CategoroyId== $v_catId->id){
                                                echo $v_catId->subCategoryName."<br>";
                                            }
                                        }
                                } ?></td>
                                <td style="color:red; font-size: large; ">{{ $item->brandName }}</td>
                                <td><img src="{{ asset('upload/thumbs/'.$item->productFile) }}"></td>
                                <td>{{ $item->condition }}</td>


                                <td>
                                    <a href="{{ url('authorize/edit-product/'.$item->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" title="Edit your Product"></span></a>
                                    <a href="" class="btn btn-info"><span class="glyphicon glyphicon-plus" title="Add to top Product"></span></a>
                                    <a href="" class="btn btn-info"><span style="color:green;" class="glyphicon glyphicon-minus" title="Remove from top product"></span></a>
                                    <a href="{{ url('authorize/product-delete/'.$item->id) }}" class="btn btn-warning" onclick="return check_delete(); "><span class="glyphicon glyphicon-trash" title="Delete all information of product"></span></a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Manufacturer name</th>
                                <th>Product Image</th>
                                <th>Product Status</th>
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