@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid ">

                <h3 class="title-1 m-b-25" style="color: green;">
                    @if(session('message'))
                        {{ session('message') }}
                    @endif
                </h3>
                <h3 class="title-1 m-b-25" style="color: red;">
                    @if(session('messageError'))
                        {{ session('messageError') }}
                    @endif
                </h3>
                <h5 style="color: red;">
                    @isset($errors)
                        @foreach($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                    @endisset
                </h5>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Product</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit product</h3>
                                </div>
                                <hr>
                                <form action="{{url("/admin/executeeditproduct")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input id="id" name="id" type="hidden" value="{{$product->id}}">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false">{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Price</label>
                                        <input id="price" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->price}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category</label>
                                        <select name="category" selected="{{$product->categoryId}}">
                                            <option value="0">Select</option>
                                            @foreach($categories as $c)
                                                @if($product->categoryId == $c->id)
                                                <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                                @else
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Action</label>
                                        <select id="action" name="action" selected="{{$product->actionId}}">
                                            <option value="0">Select</option>
                                            @foreach($actions as $a)
                                                @if($product->actionId == $a->id)
                                                <option value="{{$a->id}}" selected>{{$a->name}}</option>
                                                @endif
                                                <option value="{{$a->id}}">{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" name="btnEditProduct" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-edit fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Edit</span>
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
