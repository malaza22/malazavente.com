<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <link rel="icon" href="{{asset('img/logo.PNG')}}" sizes="32x32">
  <title>Admin | malaza.mg</title>e

  <link rel="stylesheet" href="../admin_asset/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <link rel="stylesheet" href="../admin_asset/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../admin_asset/dist/css/bootstrap-toggle.min.css">


  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/Dashboard" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="navbarDropdown"  class="nav-link"
        href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../admin_asset/index3.html" class="brand-link">
      <img src="../admin_asset/dist/img/AdminLTELogo.png" alt="Admin Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Malaza.mg</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../admin_asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{url('/admin/Dashboard')}}" class="nav-link">
              <i class="nav-icon fas  fa-bullseye"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/Category-add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/Category-liste')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>liste category</p>
                </a>
              </li>
            </ul>
          </li>          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/Product-add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/Product-liste')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>liste product</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bug"></i>
                <p>
                  Vendue
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/Vende-liste')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste vendue</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>
                  Address
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/Address-liste')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste Address</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-qrcode"></i>
                <p>
                  Commande
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/CommandeMobile-liste')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste commande mobile</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/CommandeCarte-liste')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste commande carte</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/User-liste')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste User</p>
                  </a>
                </li>
              </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 m-2">
            @if (Session::has('success'))
            <div class="alert alert-sm alert-success alert-block" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{ session('success')}}</strong>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{ session('error')}}</strong>
            </div>
            @endif
        </div>
    </div>

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="/admin">Admin.io</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Malaza</b> 1.0.0
    </div>
  </footer>
</div>
<script src="../admin_asset/plugins/jquery/jquery.min.js"></script>
<script src="../admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

{{-- <script src="../admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../admin_asset/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../admin_asset/plugins/raphael/raphael.min.js"></script>
<script src="../admin_asset/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../admin_asset/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="../admin_asset/plugins/chart.js/Chart.min.js"></script>
<script src="../admin_asset/dist/js/pages/dashboard2.js"></script> --}}

<script src="../admin_asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="../admin_asset/dist/js/adminlte.js"></script>
<script src="../admin_asset/dist/js/bootstrap-toggle.min.js"></script>

<script>
  $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
        });
</script>
    @yield('script')
    <script src="../admin_asset/dist/js/demo.js"></script>
</body>
</html>
