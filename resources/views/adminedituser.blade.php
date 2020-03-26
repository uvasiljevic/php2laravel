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
                            <div class="card-header">User</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit user</h3>
                                </div>
                                <hr>
                                <form action="{{url("/admin/executeedituser")}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <input id="id" name="id" type="hidden" class="form-control"  value="{{$user->id}}">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">First name</label>
                                        <input id="firstname" name="firstname" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->firstName}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Last name</label>
                                        <input id="lastname" name="lastname" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->lastName}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Email</label>
                                        <input id="email" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Phone</label>
                                        <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">City</label>
                                        <input id="city" name="city" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->city}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Street</label>
                                        <input id="street" name="street" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->street}}">
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Street number</label>
                                                <input id="streetNumber" name="streetNumber" type="tel" class="form-control cc-exp" value="{{$user->streetNumber}}" placeholder=""
                                                       autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Zip</label>
                                            <div class="input-group">
                                                <input id="zip" name="zip" type="tel" class="form-control cc-cvc" value="{{$user->zipCode}}">

                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" name="btnEditUser" class="btn btn-lg btn-info btn-block">
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
