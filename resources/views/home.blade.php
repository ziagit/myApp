@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{URL::to('/')}}/images/{{$posts->logo}}" alt="" style="width:95%;">
        <div style="display:flex;justify-content:space-between;background:#5a5a69;width:95%;color:#ffc800;;text-align:right;">
            <img src="{{asset('images/logo.jpg')}}" alt="" style="background: #000;width:150px;">
            <h4 style="margin-right:10px;font-size:21px;">{{$posts->details}}</h4>
        </div>

    </div>
@endsection
