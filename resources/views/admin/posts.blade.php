
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
<div class="modal fade" id="addPostModal">
    <div class="modal-dialog" style="max-width:850px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new post</h4>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-md-offset-2">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <form action="{{url('create/post')}}" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                  <div class="form-group">
                                      <label for="title">Post Title</label>
                                      <input class="form-control" id="title" name="title">
                                  </div>
                                  <div class="form-group">
                                      <label for="body">Post Body</label>
                                      <textarea class="form-control" id="body" name="body" rows="30"></textarea>
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
<div class="modal fade" id="editPostModal">
    <div class="modal-dialog" style="max-width:850px;">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update post</h4>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                              <form action="{{url('update/post')}}" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                  <div class="form-group">
                                      <label for="title">Post Title</label>
                                      <input class="form-control" id="title" name="title">
                                  </div>
                                  <div class="form-group">
                                      <label for="body">Post Body</label>
                                      <textarea class="form-control" id="body" name="body" rows="30"></textarea>
                                  </div>
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
                <div class=" col-md-12 card-header card-header-primary search-container">
                    <div class="blog-header">
                        <h4 class="card-title ">Posts</h4>
                        <p class="card-category"> Created posts</p>
                     </div>
                     <div class="col-md-6 search-blog">
                        <form action="/blog/search" method="get">
                            <div class="form-group" style="display:flex;justify-content:space-between;">
                                <input type="search" name="search" class="form-control ">
                                <span class="form-group-btn">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="blog-submit">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPostModal">
                        <i class="icon-plus">+</i>
                        </button>
                    </div>   
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @foreach($posts as $post)
                        <tr>
                          <td>{{$post->id}}</td>                        
                          <td>{{$post->title}}</td>
                          <td>{!! $post->body !!}</td>
                          <td>
                            <button type="button" class="btn btn-sm btn-success" 
                            data-toggle="modal" 
                            data-target="#editPostModal"
                            data-id="{{$post->id}}"
                            data-title="{{$post->title}}"
                            data-body="{{$post->body}}">
                            <i class="nc-icon nc-check-2"></i>
                            </button>
                         
                            <form action="/delete/post/{{$post->id}}" id="deleteitem" method="get">
                                 <button class="btn btn-sm btn-danger" type="submit"><i class="nc-icon nc-simple-delete"></i></button>
                            </form>                           
                         </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $posts->links() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- script for tinymce -->
  <script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars codesample fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media codesample",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
    tinymce.init(editor_config);
  </script>
  <!-- end of script for tinymce -->
@endsection
