@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Messages</h2>
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
                                    <th>user email</th>
                                    <th>message</th>

                                </thead>
                                <tbody>

                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{$message->id}}</td>
                                        <td>{{$message->email}}</td>
                                        <td><textarea>{{$message->message}}</textarea></td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
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
