@extends('layouts.master');
@section('stylescss')
    <link href="{{ asset('js2/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('main_content')
    @if(session('warning'))
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="alert alert-danger" style="font-size: large; padding: 2px; color: red;"><center>{{ session('warning') }}</center></div>
            </div>
        </div><hr>
    @endif
        <div id="cart_items">
            <div class="table-responsive cart_info">
            <?php $carts=Cart::content();
            $sl=1;
//             echo "<pre>";
//             print_r($carts);
//             exit();
            ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="title">Sl NO</td>
                        <td class="image">Image</td>
                        <td class="description">Product Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($carts as $item)
                    <tr>
                        <td class="cart_price"><?php echo $sl++ ?></td>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('upload/thumbs/'.$item->options->image) }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item->name }}</a></h4>
                            <p><span class="text-sm">Model No: {{ $item->id }}</span></p>
                        </td>
                        <td class="cart_price">
                            <p>BDT {{ $item->price }}.00</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{url('/decrement/'.$item->rowId)}}"> - </a>
                                <input class="cart_quantity_input" type="text" name="qty" id="res" value="{{ $item->qty }}" size="2">
                                <a class="cart_quantity_down" href="{{url('/increment/'.$item->rowId)}}"> + </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">BDT {{ $item->total }}.00</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/remove-to-cart/'.$item->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6"><span class="" style="color: red;font-size: large; text-align: center">No Cart Hare</span> </td>
                    </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <ul class="user_option">
                                <li>
                                    <input type="checkbox">
                                    <label>Use Coupon Code</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Use Gift Voucher</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Estimate Shipping & Taxes</label>
                                </li>
                            </ul>
                            <ul class="user_info">
                                <li class="single_field">
                                    <label>Country:</label>
                                    <select>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field">
                                    <label>Region / State:</label>
                                    <select>
                                        <option>Select</option>
                                        <option>Dhaka</option>
                                        <option>London</option>
                                        <option>Dillih</option>
                                        <option>Lahore</option>
                                        <option>Alaska</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field zip-field">
                                    <label>Zip Code:</label>
                                    <input type="text">
                                </li>
                            </ul>
                            <a class="btn btn-default update" href="">Get Quotes</a>
                            <a class="btn btn-default check_out" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Sub Total <span>{{ Cart::subtotal() }}</span></li>
                                <li>Eco vat (2%) <span>
                                        <?php
                                        $subtotal=Cart::subtotal() ;
                                        $subtotal=str_replace(',', '', $subtotal);
                                        $subtotal=str_replace('.00', '', $subtotal);
//                                        echo $subtotal;
                                        $vat= (2*$subtotal)/100;
                                        echo 'BDT '. $vat.'.00';
                                        ?>
                                    </span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>BDT &nbsp;<?php echo $subtotal+$vat.'.00' ?></span></li>
                            </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        @endsection
    @section('javaScript')
        <script src="{{ asset('js2/jqzoom.js') }}" type="text/javascript"></script>
        <script>
            $("#bzoom").zoom({
                zoom_area_width: 350,
                autoplay_interval :3000,
                small_thumbs : 4,
                autoplay : false
            });
        </script>
    @endsection