@extends('layouts.adminlayout')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Sliders</h2>
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
                                    <th>image</th>
                                    <th>title</th>
                                    <th class="text-right">text</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $s)
                                    @php
                                        $id = $s->id;
                                    @endphp
                                    <tr>
                                        <td>{{$s->id}}</td>
                                        <td>
                                            <img src="{{asset("/images/$s->image")}}" alt="{{$s->title}}" />
                                        </td>
                                        <td>{{$s->title}}</td>
                                        <td class="text-right"><textarea>{{$s->text}}</textarea></td>
                                        <td class="text-right">
                                            <a href="{{url("/admin/editslider/$id")}}" title="Edit"><i class="far fa-edit"></i></a>
                                        </td>
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
