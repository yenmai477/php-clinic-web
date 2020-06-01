<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title> Đăng nhập - Quản lý phòng mạch tư</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />

  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="account-pages my-5 pt-sm-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card overflow-hidden">
            <div class="bg-soft-primary">
              <div class="row">
                <div class="col-7">
                  <div class="text-primary p-4">
                    <h5 class="text-primary">Chào mừng quay lại!</h5>
                    <p>Vui lòng đăng nhập để vào phòng khám.</p>
                  </div>
                </div>
                <div class="col-5 align-self-end">
                  <img src="assets/images/profile-img.png" alt="" class="img-fluid" />
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div>
                <a href="#">
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                      <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34" />
                    </span>
                  </div>
                </a>
              </div>

              @if (count($errors) > 0 || session('error'))
              <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $err) {{$err}}<br />
                @endforeach {{session('error')}}
              </div>
              @endif @if (session('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
              @endif

              <div class="p-2">
                <form class="form-horizontal" action="{{route('dangnhap.get')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="email">Tài khoản</label>
                    <input class="form-control" id="email" name="email" type="email" required="" placeholder="Tài khoản" value="{{ old('email') }}" autocomplete="off" />
                  </div>

                  <div class="form-group">
                    <label for="userpassword">Mật khẩu</label>
                    <input type="password" class="form-control" id="userpassword" type="password" name="password" required="" placeholder="Mật khẩu" autocomplete="off" />
                  </div>

                  <div class="mt-3">
                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                      Đăng nhập
                    </button>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <script src="assets/libs/jquery/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/node-waves/waves.min.js"></script>

  <!-- App js -->
  <script src="assets/js/app.js"></script>
</body>

</html>
