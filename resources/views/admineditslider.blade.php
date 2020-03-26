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
                            <div class="card-header">Slider</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit slider</h3>
                                </div>
                                <hr>
                                <form action="{{url("/admin/executeeditslider")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input id="id" name="id" type="hidden" value="{{$slider->id}}">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$slider->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <textarea id="text" name="text" class="form-control" aria-required="true" aria-invalid="false">{{$slider->text}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" name="btnEditSlider" class="btn btn-lg btn-info btn-block">
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
