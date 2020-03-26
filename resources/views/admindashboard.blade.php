@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{$usersCount}}</h2>
                                        <span>members</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{$ordersCount}}</h2>
                                        <span>orders made</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-laptop"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{$productsCount}}</h2>
                                        <span>products</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2>${{$ordersSum}}</h2>
                                        <span>total earnings</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Orders</h2>
                        <h3 class="title-1 m-b-25" style="color: green;">
                            @if(session('message'))
                                {{ session('message') }}
                            @endif
                        </h3>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-right">Date create</th>
                                    <th class="text-right">User info</th>
                                    <th class="text-right">Send</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    @php
                                        $id = $order->id;
                                    @endphp
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <img src="{{asset("/images/$order->image")}}" alt="{{$order->title}}" />
                                        </td>
                                        <td>{{$order->title}}</td>
                                        <td class="text-right" style="white-space: nowrap; overflow: hidden;  text-overflow: ellipsis; max-width: 150px;">${{$order->price}}</td>
                                        <td class="text-right">{{$order->quantity}}</td>
                                        <td class="text-right">${{$order->orderPrice}}</td>
                                        <td class="text-right">{{$order->dateCreate}}</td>
                                        <td class="text-right">
                                            {{$order->firstName}} {{$order->lastName}} <br/>
                                            {{$order->street}} {{$order->streetNumber}}<br/>
                                            {{$order->zipCode}} {{$order->city}}
                                        </td>
                                        <td class="text-right">
                                            @if($order->send == -1)
                                            <a href="{{url("/admin/sendorder/$id")}}" title="Send"><i class="fa fa-truck"></i></a>
                                            @else
                                            <i class="fa fa-check-square" title="Sent" style="color:green;"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="product_pagination">

                            {{$orders->links()}}

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
