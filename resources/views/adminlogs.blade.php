@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Logs</h2>
                        <h3 class="title-1 m-b-25" style="color: green;">
                            @if(session('message'))
                                {{ session('message') }}
                            @endif
                        </h3>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Page</th>
                                    <th>Date</th>
                                    <th>Ip</th>

                                </thead>
                                <tbody>

                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{$log->id}}</td>
                                        <td>{{$log->page}}</td>
                                        <td>{{$log->date}}</td>
                                        <td>{{$log->ip}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="product_pagination">

                            {{$logs->links()}}

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
