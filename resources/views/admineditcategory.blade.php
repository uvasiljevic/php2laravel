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
                            <div class="card-header">Category</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit category</h3>
                                </div>
                                <hr>
                                <form action="{{url("/admin/executeeditcategory")}}" method="post">
                                    @csrf
                                    <input id="id" name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="{{$category->id}}">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Parent</label>
                                        <select name="menu">
                                            <option value="0">Select</option>
                                            @foreach($menu as $m)
                                                @if($category->parentId == $m->id)
                                                <option value="{{$m->id}}" selected>{{$m->title}}</option>
                                                @else
                                                <option value="{{$m->id}}">{{$m->title}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>


                                    <div>
                                        <button id="payment-button" type="submit" name="btnEditCategory" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-edit fa-lg"></i>
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
