@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Categories</h2>
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
                                    <th>name</th>
                                    <th>parent</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $c)
                                    @php
                                        $id = $c->id;
                                    @endphp
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->title}}</td>
                                        <td class="text-right">
                                            <a href="{{url("/admin/deletecategory/$id")}}" title="Delete"><i class="fa fa-trash"></i></a>
                                            <a href="{{url("/admin/editcategory/$id")}}" title="Edit"><i class="far fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="product_pagination">

                        {{$categories->links()}}

                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 40px;">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Category</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Insert category</h3>
                                </div>
                                <hr>
                                <form action="{{url("/admin/insertcategory")}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Parent</label>
                                        <select name="menu">
                                            <option value="0">Select</option>
                                            @foreach($menu as $m)
                                                <option value="{{$m->id}}">{{$m->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div>
                                        <button id="payment-button" type="submit" name="btnInsertCategory" class="btn btn-lg btn-info btn-block">

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
