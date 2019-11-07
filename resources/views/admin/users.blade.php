
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
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new user</h4>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-md-offset-2">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/create/user')}}">
                                  {{ csrf_field() }}

                                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                      <label for="name" class="col-md-12 control-label">Name</label>
                                      <div class="col-md-12">
                                          <input id="name" type="text" class="form-control" name="name" required autofocused>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <label for="email" class="col-md-12 control-label">Email</label>
                                      <div class="col-md-12">
                                          <input id="email" type="email" class="form-control" name="email" required autofocused>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                      <label for="role" class="col-md-12 control-label">Role</label>
                                      <div class="col-md-12">
                                          <select id="role" class="form-control" name="role" required>
                                            <option>Admin</option>
                                            <option>Guest</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <label for="password" class="col-md-12 control-label">password</label>
                                      <div class="col-md-12">
                                          <input id="password" type="password" class="form-control" name="password" required autofocused>
                                      </div>
                                  </div>
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
<div class="modal fade" id="editUserModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit user</h4>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-md-offset-2">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/update/user')}}">
                                  {{ csrf_field() }}
                                   <input type="hidden" id="id" name="id">
                                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                      <label for="name" class="col-md-12 control-label">Name</label>
                                      <div class="col-md-12">
                                          <input id="name" type="text" class="form-control" name="name" required autofocused>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <label for="email" class="col-md-12 control-label">Email</label>
                                      <div class="col-md-12">
                                          <input id="email" type="email" class="form-control" name="email" required autofocused>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                      <label for="role" class="col-md-12 control-label">Role</label>
                                      <div class="col-md-12">
                                          <select id="role" class="form-control" name="role" required>
                                            <option>Admin</option>
                                            <option>Guest</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <label for="password" class="col-md-12 control-label">password</label>
                                      <div class="col-md-12">
                                          <input id="password" type="password" class="form-control" name="password" required autofocused>
                                      </div>
                                  </div>
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

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="display:flex;justify-content:space-between">
                    <div>
                        <h4 class="card-title ">Our user members</h4>
                        <p class="card-category"> List of our user</p>
                     </div>
                    <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        <i class="icon-plus">+</i>
                        </button> 
                    </div>  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>                        
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->isAdmin}}</td>
                          <td>
                            <button type="button" class="btn btn-sm btn-success" 
                            data-toggle="modal" 
                            data-target="#editUserModal"
                            data-id="{{$user->id}}"
                            data-name="{{$user->name}}"
                            data-email="{{$user->email}}"
                            data-role="{{$user->isAdmin}}"
                            data-password="{{$user->password}}">
                            <i class="nc-icon nc-check-2"></i>
                            </button>
                          
                            <form action="/delete/user/{{$user->id}}" id="deleteitem" method="get">
                                 <button class="btn btn-sm btn-danger" type="submit"><i class="nc-icon nc-simple-delete"></i></button>
                            </form>                          
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $users->links() !!}
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
   @endsection

