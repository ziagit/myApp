@extends('layouts.new-layout')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
   <!-- add modal  -->
  <div class="modal fade" id="addTeamModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new member</h4>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-md-offset-2">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/create/team')}}">
                                  {{ csrf_field() }}

                                  <div class="form-group{{ $errors->has('Name') ? ' has-error' : '' }}">
                                      <label for="name" class="col-md-12 control-label">Name</label>
                                      <div class="col-md-12">
                                          <input id="name" type="text" class="form-control" name="name" required autofocused>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                      <label for="position" class="col-md-12 control-label">position</label>
                                      <div class="col-md-12">
                                          <input id="position" type="text" class="form-control" name="position" required autofocused>
                                      </div>
                                  </div>

                                      <label for="details" class="col-md-12 control-label">Details</label>
                                  <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                      <div class="col-md-12">
                                          <textarea rows="5" id="details" class="form-control" name="details" required></textarea>
                                      </div>
                                  </div>
                                  
                                    <!--<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">-->
                                      <label for="image" class="col-md-4 control-label">Select image</label>
                                      <div class="col-md-12">
                                          <input id="image" type="file" class="form-control" name="image">
                                      </div>
                                    <!--</div>-->

                                  <div class="form-group" style="display:flex;justify-content:space-between;">
                                      <div class="col-md-8 col-md-offset-10">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                      </div>
                                      <div class="col-md-4 col-md-offset-2">
                                          <button type="submit" class="btn btn-success">Save</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- edit modal  -->
<div class="modal fade" id="editTeamModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update team</h4>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{url('/update/team')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-12 control-label">Name</label>
                                        <div class="col-md-12">
                                            <input id="name" type="text" class="form-control" name="name" required autofocused>
                                        </div>
                                    </div>
                                     <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                      <label for="position" class="col-md-12 control-label">position</label>
                                      <div class="col-md-12">
                                          <input id="position" type="text" class="form-control" name="position" required autofocused>
                                      </div>
                                  </div>
                                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                        <label for="details" class="col-md-12 control-label">Details</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" id="details" class="form-control" name="details" required></textarea>
                                        </div>
                                    </div>
                                   
                                      <!-- <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">-->
                                        <label for="image" class="col-md-12 control-label">Image</label>
                                        <div class="col-md-12">
                                            <input vlaue="" id="image" type="file" class="form-control" name="image">
                                        </div>
                                    <!--</div>-->
                                    <div class="form-group" style="display:flex;justify-content:space-between;">
                                        <div class="col-md-8 col-md-offset-10">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>  
</div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="display:flex;justify-content:space-between">
                    <div>
                        <h4 class="card-title ">Our team members</h4>
                        <p class="card-category"> List of our team</p>
                     </div>
                    <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTeamModal">
                        <i class="icon-plus">+</i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Details</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @foreach($teams as $team)
                        <tr>
                          <td>{{$team->id}}</td>                        
                        <td>
                            <img src="{{ URL::to('/') }}/images/{{$team->image}}" class="image-thumbnail" width="75">
                        </td>
                          <td>{{$team->name}}</td>
                          <td>{{$team->position}}</td>
                          <td>{{$team->details}}</td>
                          <td>
                            <button type="button" class="btn btn-sm btn-success" 
                            data-toggle="modal" 
                            data-target="#editTeamModal"
                            data-id="{{$team->id}}"
                            data-name="{{$team->name}}"
                            data-position="{{$team->position}}"
                            data-email="{{$team->email}}"
                            data-details="{{$team->details}}">
                            <i class="nc-icon nc-check-2"></i>
                            </button>

                            <form action="/delete/team/{{$team->id}}" id="deleteitem" method="get">
                                 <button class="btn btn-sm btn-danger" type="submit"><i class="nc-icon nc-simple-delete"></i></button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $teams->links() !!}
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
   @endsection
