<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><h2>Login</h2></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @include('admin.alert')
        <form action="/admin/users/login/store" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="icheck-primary">
            <a class="forgot-link" style="font-size: 13px" href="/admin/users/forgot">Forgot password?</a>
          </div>
          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <a href="/admin/users/register" class="btn btn-block" style="background-color: #182233;color:#fff">Register</a>
            </div>
            <!-- /.col -->
          </div>
          @csrf
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
    @include('admin.footer')
</body>
</html>