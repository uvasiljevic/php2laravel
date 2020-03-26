@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Public users</h2>
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
                                    <th>first name</th>
                                    <th>last name</th>
                                    <th class="text-right">email</th>
                                    <th class="text-right">phone</th>
                                    <th class="text-right">city</th>
                                    <th class="text-right">zip</th>
                                    <th class="text-right">street</th>
                                    <th class="text-right">street number</th>
                                    <th class="text-right">role</th>
                                    <th class="text-right">date create</th>
                                    <th class="text-right">date edit</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    @php
                                    $id = $user->id;
                                    @endphp
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->firstName}}</td>
                                    <td>{{$user->lastName}}</td>
                                    <td class="text-right">{{$user->email}}</td>
                                    <td class="text-right">{{$user->phone}}</td>
                                    <td class="text-right">{{$user->city}}</td>
                                    <td>{{$user->zipCode}}</td>
                                    <td>{{$user->street}}</td>
                                    <td>{{$user->streetNumber}}</td>
                                    <td class="text-right">User</td>
                                    <td class="text-right">{{$user->dateCreate}}</td>
                                    <td class="text-right">{{$user->dateEdit}}</td>
                                    <td class="text-right">
                                        <a href="{{url("/admin/deleteuser/$id")}}" title="Delete"><i class="fa fa-trash"></i></a>
                                        <a href="{{url("/admin/edituser/$id")}}" title="Edit"><i class="far fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="product_pagination">

                            {{$users->links()}}

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
