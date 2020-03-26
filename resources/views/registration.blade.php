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
                        <div class="section_title">Registration</div>
                        <div class="section_subtitle">Already have account? Log in <a href="{{url("/login")}}">here</a></div>
                        <div class="section_subtitle" style="color: red;">
                            @isset($errors)
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br/>
                                @endforeach
                            @endisset
                        </div>
                        <div class="checkout_form_container">
                            <form action="{{ url("/insertuser") }}" method="POST" id="checkout_form" class="checkout_form">
                                @csrf

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">First Name*</label>
                                        <input type="text" id="firstname" name="firstname" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Last Name*</label>
                                        <input type="text" id="lastname" name="lastname" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">Email*</label>
                                        <input type="text" id="email" name="email" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Phone*</label>
                                        <input type="text" id="phone" name="phone" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">City*</label>
                                        <input type="text" id="city" name="city" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Zip code*</label>
                                        <input type="number" id="zip" name="zip" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">Street*</label>
                                        <input type="text" id="street" name="street" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Street number*</label>
                                        <input type="text" id="streetNumber" name="streetNumber" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">Password*</label>
                                        <input type="password" id="password" name="password" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Re-type password*</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="checkout_input" required="required">
                                    </div>
                                </div>
                                <div class="button order_button"><input type="submit" name="btnReg" id="btnReg" value="Registration"/></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
