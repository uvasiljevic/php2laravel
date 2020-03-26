@extends('layouts.thirdlayout')
@section('links')
    <link rel="stylesheet" type="text/css" href="{{asset("styles/categories.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("styles/categories_responsive.css")}}">
@endsection
@section('content')
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">

                <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Showing <span id="count"></span> results</div>
                    <div class="sorting_container ml-md-auto">

                        <div class="sorting">

                            <form action="{{url()->current()}}" method="post">
                            @csrf
                            <span class="sorting_text" >Search:</span>
                            <input type="text" id="search" name="search" value=""/>

                        </div>
                    </div>

                    <div class="sorting_container ml-md-auto">

                        <div class="sorting">

                            <span class="sorting_text" >Sort by:</span>

                            <select id="sort" name="sort">
                                <option class="product_sorting_btn" value="0" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></option>
                                <option class="product_sorting_btn" value="1" data-isotope-option='{ "sortBy": "price" }'><span>Price ASC</span></option>
                                <option class="product_sorting_btn" value="2" data-isotope-option='{ "sortBy": "price" }'><span>Price DESC</span></option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="product_grid">
                    <div id="products">

                    <!-- Product -->

                    @foreach($products as $product)
                        <div class="product col-lg-3">
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

                    </div>



                </div>
                <div class="product_pagination">

                    <ul id="pag" style="margin: auto">

                    </ul>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Icon Boxes -->

<div class="icon_boxes">
    <div class="container">
        <div class="row icon_box_row">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="{{asset("images/icon_1.svg")}}" alt=""></div>
                    <div class="icon_box_title">Free Shipping Worldwide</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="{{asset("images/icon_2.svg")}}" alt=""></div>
                    <div class="icon_box_title">Free Returns</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="{{asset("images/icon_3.svg")}}" alt=""></div>
                    <div class="icon_box_title">24h Fast Support</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset("js/categories.js")}}"></script>
@endsection
