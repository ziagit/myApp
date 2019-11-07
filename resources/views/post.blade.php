@extends('layouts.app')

@section('content')
      @foreach($post as $pst)
      <div>
        <h1>{{$pst->title}}</h1>
        <p>{!! $pst->body !!}</p>
      </div>
      @endforeach

  <div>
    <button class="btn btn-primary" data-toggle="collapse" data-target="#comment">Comment</button>
    <div id="comment" class="collapse">
        <form action="{{url('create/comment')}}/{{$pst->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div style="display:flex;justify-content:space-between;">
            <div class="form-group" style="width:48%;">
                <label for="name">Name</label>
                <input class="form-control" id="name" name="user_name">
            </div>
            <div class="form-group" style="width:48%;">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email">
            </div>
            </div>
            <div class="form-group">
                <label for="body">Comment Body</label>
                <textarea class="form-control" id="body" name="body" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </form>   
    </div>
    <div class="comment">
        @foreach($pst->comments as $comment)
        <p><span class="label label-warning">{{$comment->user_name}}</span> {{$comment->created_at}}</p>
        <p>{!! $comment->body !!}</p>
        <button class="btn btn-primary btn-xs pull-right" data-toggle="collapse" data-target="#sub-comment">Answer</button>
        <div id="sub-comment" class="collapse">
        <form action="{{url('create/comment')}}/{{$pst->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div style="display:flex;justify-content:space-between;">
            <div class="form-group" style="width:48%;">
                <label for="name">Name</label>
                <input class="form-control" id="name" name="user_name">
            </div>
            <div class="form-group" style="width:48%;">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email">
            </div>
            </div>
            <div class="form-group">
                <label for="body">Comment Body</label>
                <textarea class="form-control" id="body" name="body" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </form>   
    </div>
        @endforeach
    </div>


  </div>


 <!-- script for tinymce -->
<!--  <script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea",
      plugins: [
        "lists link charmap hr anchor pagebreak",
        "codesample ",
        "save   ",
        "paste textcolor colorpicker "
      ],
      toolbar: "styleselect | bold | alignleft aligncenter alignright | numlist | link codesample",
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
  </script> -->
  <!-- end of script for tinymce -->
@endsection
