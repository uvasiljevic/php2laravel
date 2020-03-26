@extends('layouts.thirdlayout')
@section('links')
    <link rel="stylesheet" type="text/css" href="{{asset("styles/product.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("styles/product_responsive.css")}}">
@endsection
@section('content')
<div class="product_details">
    <div class="container">
        <div class="row details_row">

            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="details_image">
                    @php
                    $image = $product[0]->image;
                    @endphp
                    <div class="details_image_large"><img src="{{asset("images/$image")}}" alt="{{$product[0]->title}}"><div class="product_extra {{$product[0]->class}}"><a>{{$product[0]->name}}</a></div></div>

                </div>
            </div>

            <!-- Product Content -->
            <div class="col-lg-6">
                <div class="details_content">
                    <div class="details_name">{{$product[0]->title}}</div>
{{--                    <div class="details_discount">$890</div>--}}
                    <div class="details_price">${{$product[0]->price}}</div>

                    <!-- In Stock -->
                    <div class="in_stock_container">
                        <div class="availability">Availability:</div>
                        <span>In Stock</span>
                    </div>
                    <div class="details_text">
                        <p>{{$product[0]->description}}</p>
                    </div>

                    <!-- Product Quantity -->
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Qty</span>
                            @php
                                $id = $product[0]->id;
                            @endphp
                            <form action="{{url("/addtocart/$id")}}" method="GET">
                            <input id="quantity" name="quantity" type="number" style="width: 100%;" pattern="[0-9]*" value="1">

                        </div>
                        @if(session()->has('user'))
                            <div class="button cart_button"><input type="submit" id="btnCart" name="btnCart" value="Add to cart"/></form></div>
                        @else
                            <div class="cart_button"><p style="color: green;">Log in to order</p></div>
                        @endif
                        <div style="color: red;">
                            @isset($errors)
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br/>
                                @endforeach
                            @endisset
                        </div>
                        <div style="color: green;">
                            @if(session('message'))
                                {{ session('message') }}
                            @endif
                        </div>
                    </div>

                    <!-- Share -->
                    <div class="details_share">
                        <span>Share:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row description_row">
            <div class="col">
                <div class="description_title_container">
                    <div class="description_title">Description</div>
                </div>
                <div class="description_text">
                    <p>{{$product[0]->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products -->

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="products_title">Related Products</div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="product_grid">

                    <!-- Product -->
                    @foreach($relatedProducts as $product)
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
{{--                    <div class="product">--}}
{{--                        <div class="product_image"><img src="images/product_1.jpg" alt=""></div>--}}
{{--                        <div class="product_extra product_new"><a href="categories.html">New</a></div>--}}
{{--                        <div class="product_content">--}}
{{--                            <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                            <div class="product_price">$670</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Product -->--}}
{{--                    <div class="product">--}}
{{--                        <div class="product_image"><img src="images/product_2.jpg" alt=""></div>--}}
{{--                        <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>--}}
{{--                        <div class="product_content">--}}
{{--                            <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                            <div class="product_price">$520</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Product -->--}}
{{--                    <div class="product">--}}
{{--                        <div class="product_image"><img src="images/product_3.jpg" alt=""></div>--}}
{{--                        <div class="product_content">--}}
{{--                            <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                            <div class="product_price">$710</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Product -->--}}
{{--                    <div class="product">--}}
{{--                        <div class="product_image"><img src="images/product_4.jpg" alt=""></div>--}}
{{--                        <div class="product_content">--}}
{{--                            <div class="product_title"><a href="product.html">Smart Phone</a></div>--}}
{{--                            <div class="product_price">$330</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
