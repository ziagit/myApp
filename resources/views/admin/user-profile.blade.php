@extends('layouts.new-layout')

@section('content')
<!-- Titlebar
================================================== -->


  <!-- Content -->
  <div id="content">
    <div class="container">
      <div class="row">
                
        <div class="span5">
          <h3>Welcome {{Auth::user()->name}} !!!</h3>
          <br>
          @if($message = Session::get('noadmin'))
            <div class="alert alert-danger">
                <h3> {{$message}} !!!</h3>
            </div>
          @endif
          <!-- form -->
        <div class="col-md-12">    
             <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
               @if(!empty(Auth::user()) ? Auth::user()->isAdmin: '')
                <a href="/dashboard" style="color:blue;">Go to dashboard</a>
                @endif
                <br>
                <a href="#" style="color:blue;" >Edit profile</a>


        </div>
        
          <!-- form End -->
        </div>
        <div class="span6">
  
        </div>       

      <div class="row space50"></div> 
    </div>
  </div>
  <!-- Content End -->
  @endsection