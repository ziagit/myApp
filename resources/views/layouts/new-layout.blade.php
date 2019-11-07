
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="">
  <link rel="icon" type="image/png" href="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin, monkeyclass
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('new-theme/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('new-theme/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
  <link href="{{asset('new-theme/demo/demo.css')}}" rel="stylesheet" />
  <link href="{{ asset('prism/prism.css') }}" rel="stylesheet">
  <style>
  .actv{
    color: #51cbce !important;
  }
</style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
   
      <div class="logo">
        <a href="/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('images/logo.jpg')}}">
          </div>
        </a>
        <a href="/" class="simple-text logo-normal">
          My<span style="color:#ffbc00;"> App</span>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/dashboard"  class="{{Request::is('dashboard') ? 'actv': ''}} ">
              <i class="nc-icon nc-bank {{Request::is('dashboard') ? 'actv': ''}} "></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a class="{{Request::is('client') ? 'actv': ''}} nav-link" href="/client">
              <i class="nc-icon nc-minimal-right {{Request::is('client') ? 'actv': ''}} "></i>
              <p>Posts</p>
            </a>
          </li>
          <li>
            <a class="{{Request::is('team') ? 'actv': ''}} nav-link" href="/team">
              <i class="nc-icon nc-minimal-right {{Request::is('team') ? 'actv': ''}} "></i>
              <p>Our team</p>
            </a>
          </li>
          <li>
            <a class="{{Request::is('user') ? 'actv': ''}} nav-link" href="/user">
              <i class="nc-icon nc-minimal-right {{Request::is('user') ? 'actv': ''}} "></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">My dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-bell-55 "></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="/user/user-profile">User Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style="background-color: #fff;color:#66615B;;font-size:14px;border: none;margin-left: 10px; cursor:pointer;">Logout</button>                    
                </form> 
                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="content">
        @yield('content')
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="#" target="_blank">My App</a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by My App Team
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('prism/prism.js') }}"></script>

  <script src="{{asset('new-theme/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('new-theme/js/core/popper.min.js')}}"></script>
  <script src="{{asset('new-theme/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('new-theme/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('new-theme/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('new-theme/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('new-theme/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('new-theme/demo/demo.js')}}"></script>
  <script>

   $('#editClientModal').on('show.bs.modal', function(event){
       var button = $(event.relatedTarget)
       var id = button.data('id')
       var name = button.data('name')
       var details = button.data('details')
       var logo = button.data('logo')
       var modal = $(this)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #name').val(name)
       modal.find('.modal-body #details').val(details)
       modal.find('.modal-body #logoimg').prop("src", "{{URL::to('/')}}/images"+"/"+logo)
   });

   $('#editPostModal').on('show.bs.modal', function(event){
       var button = $(event.relatedTarget)
       var id = button.data('id')
       var title = button.data('title')
       var body = button.data('body')
       var modal = $(this)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #title').val(title)
       modal.find('.modal-body #body').val(body)
   });
   $('#editTeamModal').on('show.bs.modal', function(event){
       var button = $(event.relatedTarget)
       var id = button.data('id')
       var name = button.data('name')
       var position = button.data('position')
       var details = button.data('details')
       var modal = $(this)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #name').val(name)
       modal.find('.modal-body #details').val(details)
   });

   $('#editUserModal').on('show.bs.modal', function(event){
       var button = $(event.relatedTarget)
       var id = button.data('id')
       var name = button.data('name')
       var email = button.data('email')
       var role = button.data('role')
       var password = button.data('password')
       var modal = $(this)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #name').val(name)
       modal.find('.modal-body #email').val(email)
       modal.find('.modal-body #role').val(role)
       modal.find('.modal-body #password').val(password)
   });

   setTimeout(function() {
        $('.alert-success').css('display','none');
          }, 500);

    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });

    $('#deleteitem').on("submit", function(){
      return confrim("Are you sure you want to delete?");
    });
  </script>
</body>

</html>
