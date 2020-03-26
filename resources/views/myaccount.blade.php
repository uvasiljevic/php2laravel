@extends('layouts.authlayout')
@section('links')
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
@endsection

@section('content')
    <div class="checkout">
        <div class="container">
            <div class="row">


                <div class="col-lg-12">
                    <div class="billing checkout_section">
                        <div class="section_title">My account</div>
                        <div class="section_subtitle">Edit your account info.</div>
                        <div class="section_subtitle" style="color: green;">
                            @if(session('message'))
                                {{ session('message') }}
                            @endif
                        </div>
                        <div class="section_subtitle" style="color: red;">
                            @isset($errors)
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br/>
                                @endforeach
                            @endisset
                        </div>
                        <div class="section_subtitle" style="color: red;">
                            @if(session('messageError'))
                                {{ session('messageError') }}
                            @endif
                        </div>
                        <div class="checkout_form_container">
                            <form action="{{ url("/edituserinfo") }}" method="POST" id="checkout_form" class="checkout_form">
                                @csrf

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <input type="hiddern" id="id" name="id" class="checkout_input" required="required" value="{{session()->get('user')->id}}">

                                        <label for="checkout_name">First Name*</label>
                                        <input type="text" id="firstname" name="firstname" class="checkout_input" required="required" value="{{session()->get('user')->firstName}}">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Last Name*</label>
                                        <input type="text" id="lastname" name="lastname" class="checkout_input" required="required" value="{{session()->get('user')->lastName}}">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">Email*</label>
                                        <input type="text" id="email" name="email" class="checkout_input" required="required" value="{{session()->get('user')->email}}">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Phone*</label>
                                        <input type="text" id="phone" name="phone" class="checkout_input" required="required" value="{{session()->get('user')->phone}}">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">City*</label>
                                        <input type="text" id="city" name="city" class="checkout_input" required="required" value="{{session()->get('user')->city}}">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Zip code*</label>
                                        <input type="number" id="zip" name="zip" class="checkout_input" required="required" value="{{session()->get('user')->zipCode}}">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">Street*</label>
                                        <input type="text" id="street" name="street" class="checkout_input" required="required" value="{{session()->get('user')->street}}">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Street number*</label>
                                        <input type="text" id="streetNumber" name="streetNumber" class="checkout_input" required="required" value="{{session()->get('user')->streetNumber}}">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_last_name">New password*</label>
                                        <input type="password" id="newpassword" name="newpassword" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <div class="button order_button" style="margin-top: 20px;"><input type="submit" name="btnEditInfo" id="btnEditInfo" value="Edit"/></div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
