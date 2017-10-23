<?php
//use DB;
        use Illuminate\Support\Str;

$banner = DB::table('products')
    ->where('top_product', 1)
    ->orderBy('id', 'desc')
    ->limit(5)
    ->get();;

//print_r($banner); exit();

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators bg-blue">
                    <li data-target="#slider-carousel" data-slide-to="0" class="active" ></li>
                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <?php $i=1; ?>
                    @foreach($banner as $item)
                    @if($i==1)
                    <div class="item active">
                        @else
                            <div class="item">
                     @endif
                        <div class="col-sm-6">
                            <h1 style="color: red;">{{ $item->productName }}</h1>
                            <h3>Model No: {{ $item->modelNo }}</h3>
                            <p> {!! Str::words($item->productDescription, 100, '....')  !!}</p>
                            <a  href="/user-product-details/{{ $item->id }}" class="btn btn-primary">Get it now</a>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('upload/slider_image/'.$item->productFile)}}" class="girl img-responsive" alt="" />
                            {{--<img src="{{ asset('images/home/pricing.png')}}"  class="pricing" alt="" />--}}
                        </div>
                    </div>
                        <?php $i++ ?>
                @endforeach
                </div>

                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

            {{--<div id="slider-carousel" class="carousel slide" data-ride="carousel">--}}
                {{--<ol class="carousel-indicators">--}}
                    {{--<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>--}}
                    {{--<li data-target="#slider-carousel" data-slide-to="1"></li>--}}
                    {{--<li data-target="#slider-carousel" data-slide-to="2"></li>--}}
                {{--</ol>--}}
                {{--<div class="carousel-inner">--}}

                    {{--<div class="item active">--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<h1><span>E</span>-SHOPPER</h1>--}}
                            {{--<h2>Free E-Commerce Template</h2>--}}
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>--}}
                            {{--<button type="button" class="btn btn-default get">Get it now</button>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<img src="{{ asset('images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />--}}
                            {{--<img src="{{ asset('images/home/pricing.png')}}"  class="pricing" alt="" />--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

                {{--<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">--}}
                    {{--<i class="fa fa-angle-left"></i>--}}
                {{--</a>--}}
                {{--<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">--}}
                    {{--<i class="fa fa-angle-right"></i>--}}
                {{--</a>--}}
            {{--</div>--}}
        </div>
    </div>
</div>