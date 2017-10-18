@extends('layouts.master')
@section('stylescss')
    <link href="{{ asset('js2/style.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('main_content')
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <div class="bzoom_wrap">
                    <ul id="bzoom">
                        <li>
                            <img class="bzoom_thumb_image" src="{{ asset('images/home/product1.jpg') }}" title="first img" />
                            <img class="bzoom_big_image" src="{{ asset('images/home/product1.jpg') }}"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="{{ asset('images/home/product2.jpg') }}" title="first img" />
                            <img class="bzoom_big_image" src="{{ asset('images/home/product2.jpg') }}"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="{{ asset('images/home/product3.jpg') }}" title="first img" />
                            <img class="bzoom_big_image" src="{{ asset('images/home/product3.jpg') }}"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="{{ asset('images/home/product1.jpg') }}" title="first img" />
                            <img class="bzoom_big_image" src="{{ asset('images/home/product1.jpg') }}"/>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>Anne Klein Sleeveless Colorblock Scuba</h2>
                <p>Web ID: 1089772</p>
                <img src="images/product-details/rating.png" alt="" />
                <span>
									<span>US $59</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                <span>US $59</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> E-SHOPPER</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div>
@endsection

@section('javaScript')
    <script src="{{ asset('js2/jquery-2.1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js2/jqzoom.js') }}" type="text/javascript"></script>
    <script>
        $("#bzoom").zoom({
            zoom_area_width: 350,
            autoplay_interval :3000,
            small_thumbs : 5,
            autoplay : false
        });
    </script>
@endsection
