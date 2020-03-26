@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Products</h2>
                        <h3 class="title-1 m-b-25" style="color: green;">
                            @if(session('message'))
                                {{ session('message') }}
                            @endif
                        </h3>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>image</th>
                                    <th>title</th>
                                    <th class="text-right">description</th>
                                    <th class="text-right">price</th>
                                    <th class="text-right">category</th>
                                    <th class="text-right">action</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                    @php
                                        $id = $product->id;
                                    @endphp
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            <img src="{{asset("/images/$product->image")}}" alt="{{$product->title}}" />
                                        </td>
                                        <td>{{$product->title}}</td>
                                        <td class="text-right" style="white-space: nowrap; overflow: hidden;  text-overflow: ellipsis; max-width: 150px;">{{$product->description}}</td>
                                        <td class="text-right">${{$product->price}}</td>
                                        <td class="text-right">{{$product->categoryName}}</td>
                                        <td class="text-right">{{$product->actionName}}</td>
                                        <td class="text-right">
                                            <a href="{{url("/admin/deleteproduct/$id")}}" title="Delete"><i class="fa fa-trash"></i></a>
                                            <a href="{{url("/admin/editproduct/$id")}}" title="Edit"><i class="far fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="product_pagination">

                            {{$products->links()}}

                        </div>
                    </div>

                </div>

                <div class="row justify-content-center" style="margin-top: 40px;">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Product</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Insert product</h3>
                                </div>
                                <hr>
                                <form action="{{url("/admin/insertproduct")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Price</label>
                                        <input id="price" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category</label>
                                        <select name="category">
                                            <option value="0">Select</option>
                                            @foreach($categories as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Action</label>
                                        <select id="action" name="action">
                                            <option value="0">Select</option>
                                            @foreach($actions as $a)
                                                <option value="{{$a->id}}">{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" name="btnInsertProduct" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Insert</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
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
