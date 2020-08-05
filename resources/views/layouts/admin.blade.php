<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html  lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-rtl.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>DS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>DigiSay</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->




            </ul>
    
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

            </div>
            
            <div class="pull-left info">
              <p>{{auth()->guard('admin')->user()->name}}</p>
              <!-- Status -->
             

              
             
             
                
            </div>
           
          </div>

 

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">

            <!-- Optionally, you can add icons to the links -->
           
            <li class="treeview">
              <a href=""><i class="fa fa-link"></i> <span>Clients</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{route('clients.create')}}" ><i class="fa fa-language"></i> Add new client</a></li>

      <li><a href="{{route('clients.index')}}" ><i class="fa fa-language"></i> Show all clients</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href=""><i class="fa fa-link"></i> <span>Services</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{route('services.create')}}" ><i class="fa fa-language"></i> Add new service</a></li>

      <li><a href="{{route('services.index')}}" ><i class="fa fa-language"></i> Show all services</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href=""><i class="fa fa-link"></i> <span>Admins</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{route('admins.create')}}" ><i class="fa fa-language"></i> Add new admin</a></li>

        <li><a href="{{route('admins.index')}}" ><i class="fa fa-language"></i>Show all admins</a></li>
              </ul>
            </li>
            <li ><a href="{{route('logout')}}"><i class="fa fa-link"></i> <span>Logout</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
@if(session()->has('success'))
<div class="callout callout-info">

            <p>{{session()->get('success')}}</p>
          </div>
          @endif
          <!-- Your Page Content Here -->



@yield('content')






        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
     
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="">DigiSay</a>.</strong> All rights reserved.
      </footer>


      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{asset('app/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- Ck EDitor -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
<script>

    CKEDITOR.replace('editor1');

</script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

  </body>
</html>
