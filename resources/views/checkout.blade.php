@extends('layouts.secondlayout')
@section('links')
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
@endsection
@section('content')
<div class="checkout">
    <div class="container">
        <div class="row">

            <!-- Billing Info -->
            <div class="col-lg-6">
                <div class="billing checkout_section">
                    <div class="section_title">Billing Address</div>
                    <div class="section_subtitle">Enter your address info</div>
                    <div class="checkout_form_container">
                        <form action="#" id="checkout_form" class="checkout_form">
                            <div class="row">
                                <div class="col-xl-6">
                                    <!-- Name -->
                                    <label for="checkout_name">First Name*</label>
                                    @if(session()->has('user'))
                                        <input type="text" id="ch_firstname" name="ch_firstname" class="checkout_input" required="required" value="{{session()->get('user')->firstName}}"/>
                                    @else
                                        <input type="text" id="ch_firstname" name="ch_firstname" class="checkout_input" required="required">
                                    @endif

                                </div>
                                <div class="col-xl-6 last_name_col">
                                    <!-- Last Name -->
                                    <label for="checkout_last_name">Last Name*</label>
                                    @if(session()->has('user'))
                                        <input type="text" id="ch_lastname" name="ch_lastname" class="checkout_input" required="required" value="{{session()->get('user')->lastName}}"/>
                                    @else
                                        <input type="text" id="ch_lastname" name="ch_lastname" class="checkout_input" required="required">
                                    @endif
                                </div>
                            </div>
                            <div>
                                <!-- Address -->
                                <label for="checkout_address">Street*</label>
                                @if(session()->has('user'))
                                    <input type="text" id="ch_street" name="ch_street" class="checkout_input" required="required" value="{{session()->get('user')->street}}"/>
                                @else
                                    <input type="text" id="ch_street" name="ch_street" class="checkout_input" required="required">
                                @endif
                            </div>
                            <div>
                                <!-- Address -->
                                <label for="checkout_address">Street number*</label>
                                @if(session()->has('user'))
                                    <input type="number" id="ch_streetNumber" name="ch_streetNumber" class="checkout_input" required="required" value="{{session()->get('user')->streetNumber}}"/>
                                @else
                                    <input type="number" id="ch_streetNumber" name="ch_streetNumber" class="checkout_input" required="required">
                                @endif
                            </div>
                            <div>
                                <!-- Zipcode -->
                                <label for="checkout_zipcode">Zipcode*</label>
                                @if(session()->has('user'))
                                    <input type="number" id="ch_zip" name="ch_zip" class="checkout_input" required="required" value="{{session()->get('user')->zipCode}}"/>
                                @else
                                    <input type="number" id="ch_zip" name="ch_zip" class="checkout_input" required="required">
                                @endif
                            </div>
                            <div>
                                <!-- City / Town -->
                                <label for="checkout_city">City/Town*</label>
                                @if(session()->has('user'))
                                    <input type="text" id="ch_city" name="ch_city" class="checkout_input" required="required" value="{{session()->get('user')->city}}"/>
                                @else
                                    <input type="text" id="ch_city" name="ch_city" class="checkout_input" required="required">
                                @endif
                            </div>
                            <div>
                                <!-- Phone no -->
                                <label for="checkout_phone">Phone no*</label>
                                @if(session()->has('user'))
                                    <input type="text" id="ch_phone" name="ch_phone" class="checkout_input" required="required" value="{{session()->get('user')->phone}}"/>
                                @else
                                    <input type="text" id="ch_phone" name="ch_phone" class="checkout_input" required="required">
                                @endif
                            </div>
                            <div>
                                <!-- Email -->
                                <label for="checkout_email">Email Address*</label>
                                @if(session()->has('user'))
                                    <input type="email" id="ch_email" name="ch_email" class="checkout_input" required="required" value="{{session()->get('user')->email}}"/>
                                @else
                                    <input type="email" id="ch_email" name="ch_email" class="checkout_input" required="required">
                                @endif
                            </div>
                            <div class="checkout_extra">
                                <div>
                                    <input type="checkbox" id="ch_terms" name="ch_terms" class="regular_checkbox" checked="checked">
                                    <label for="checkbox_terms"><img src="images/check.png" alt=""></label>
                                    <span class="checkbox_title">Terms and conditions</span>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <!-- Order Info -->

            <div class="col-lg-6">
                <div class="order checkout_section">
                    <div class="section_title">Your order</div>
                    <div class="section_subtitle">Order details</div>

                    <!-- Order details -->
                    <div class="order_list_container">
                        <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                            <div class="order_list_title">Product</div>
                            <div class="order_list_value ml-auto">Total</div>
                        </div>
                        <ul class="order_list">
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Cocktail Yellow dress</div>
                                <div class="order_list_value ml-auto">$59.90</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Subtotal</div>
                                <div class="order_list_value ml-auto">$59.90</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Shipping</div>
                                <div class="order_list_value ml-auto">Free</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Total</div>
                                <div class="order_list_value ml-auto">$59.90</div>
                            </li>
                        </ul>
                    </div>

                    <!-- Payment Options -->
                    <div class="payment">
                        <div class="payment_options">
                            <label class="payment_option clearfix">Paypal
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Cach on delivery
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Credit card
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Direct bank transfer
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>

                    <!-- Order Text -->
                    <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
                    <div class="button order_button"><input type="submit" name="btnOrder" id="btnOrder" value="Place order"/></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="js/checkout.js"></script>
@endsection
