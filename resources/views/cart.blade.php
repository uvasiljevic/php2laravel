@extends('layouts.secondlayout')
@section('links')
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
@endsection
@section('content')
    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>

            <div class="row cart_items_row">
                <div class="col">
                    @if(session()->has('cart'))
                        @php
                            $forPay = 0
                        @endphp
                    @foreach(session()->get('cart') as $items)
                        @php
                            $id      = $items[0]->id;
                            $total   = $items[0]->price*$items[0]->quantity;
                            $img     = $items[0]->image;
                            $forPay += $total;
                        @endphp
                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div><img src="{{asset("images/$img")}}" alt="{{$items[0]->title}}"></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="{{url("/product/$id")}}">{{$items[0]->title}}</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">${{$items[0]->price}}</div>
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                            {{$items[0]->quantity}}
                        </div>
                        <!-- Total -->
                        <div class="cart_item_total">${{$total}}</div>
                    </div>
                    @endforeach
                    @else

                        @if(session('message'))
                        <h3 style="color:green;">{{ session('message') }}</h3><br/>
                        @endif

                        <h3>Cart is empty</h3>
                    @endif
                </div>

            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="/products">Continue shopping</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            @if(session()->has('cart'))
                            <div class="button clear_cart_button"><a href="{{url("/emptycart")}}">Clear cart</a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra justify-content-end">

                @if(session()->has('cart'))
                <div class="col-lg-6">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">${{$forPay}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="{{url('makeorder')}}">Make order</a></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
