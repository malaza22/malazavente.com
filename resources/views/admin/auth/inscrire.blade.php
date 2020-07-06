<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin | malaza.mg</title>
  <link rel="stylesheet" href="../admin_asset/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../admin_asset/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>MALAZA</a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <form action="{{url('/admin/inscrire')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <input class="form-control" type="hidden" name="role_id" id="role_id" value="1">
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{url('/admin/connecter')}}" class="text-center">Sign in</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<script src="../admin_asset/plugins/jquery/jquery.min.js"></script>
<script src="../admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../admin_asset/dist/js/adminlte.js"></script>

<script src="../admin_asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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