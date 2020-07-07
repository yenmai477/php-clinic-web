@extends('index.layout.index')
@section('title')
<title>Đổi mật khẩu - Quản lý phòng mạch tư</title>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Đổi mật khẩu</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Đổi mật khẩu</li>
        </ol>
      </div>

    </div>
  </div>
</div>

@if (count($errors) > 0 || session('error'))
<div class="alert alert-danger" role="alert">
  <strong>Cảnh báo!</strong><br>
  @foreach($errors->all() as $err)
  {{$err}}<br />
  @endforeach
  {{session('error')}}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
  <strong>Thành công!</strong>
  <button type="button" class="close" data-dismiss="alert">×</button>
  <br />
  {{session('success')}}
</div>
@endif

<!--end duong dan nho-->
<div class="row">
  <div class="col-sm-6">
    <div class="card-box">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4 font-size-16">Đổi mật khẩu</h4>
          <div class="row">
            <div class="col-md-12">
              <div class="p-l-r-10">
                <form class="form-horizontal" role="form" action="{{route('doimatkhau.post')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label">Mật khẩu hiện tại</label>
                    <input type="password" name="passold" class="form-control" placeholder="Nhập lại mật khẩu hiện tại để xác minh." autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Mật khẩu mới</label>
                    <input type="password" name="passnew" class="form-control" placeholder="Nhập mật khẩu mới." autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nhập lại mật khẩu mới</label>
                    <input type="password" name="re-passnew" class="form-control" placeholder="Nhập lại mật khẩu mới." autocomplete="off">
                  </div>


                  <div class="form-group">
                    <button class="ladda-button btn btn-dark" data-style="expand-right">Đổi mật khẩu</button>
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
@endsection
