@extends('layouts.homelayout')
@section('links')
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
@endsection
@section('products')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="product_grid" id="productshome">

                <!-- Product -->

                @foreach($products as $product)
                <div class="product">
                    <div class="product_image"><img src="{{asset("images/$product->image")}}" alt=""></div>
                    @if($product->actionId != 4)
                    <div class="product_extra {{$product->class}}"><a href="{{url("/product/$product->id")}}">{{$product->name}}</a></div>
                    @endif
                    <div class="product_content">

                        <div class="product_title"><a href="{{url("/product/$product->id")}}">{{$product->title}}</a></div>
                        <div class="product_price">${{$product->price}}</div>
                    </div>
                </div>
                @endforeach
                <!-- Product -->
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_2.jpg" alt=""></div>--}}
{{--                    <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Product -->--}}
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_3.jpg" alt=""></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Product -->--}}
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_4.jpg" alt=""></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Product -->--}}
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_5.jpg" alt=""></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Product -->--}}
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_6.jpg" alt=""></div>--}}
{{--                    <div class="product_extra product_hot"><a href="categories.html">Hot</a></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Product -->--}}
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_7.jpg" alt=""></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Product -->--}}
{{--                <div class="product">--}}
{{--                    <div class="product_image"><img src="images/product_8.jpg" alt=""></div>--}}
{{--                    <div class="product_extra product_sale"><a href="categories.html">Hot</a></div>--}}
{{--                    <div class="product_content">--}}
{{--                        <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                        <div class="product_price">$670</div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

        </div>
    </div>
</div>
@endsection
