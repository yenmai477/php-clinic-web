@extends('index.layout.index')
@section('title')
<title>Hồ sơ - Quản lý phòng mạch tư</title>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Hồ sơ</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Hồ sơ</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!--end duong dan nho-->

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
  {{session('thongbao')}}
</div>
@endif

<div class="row">
  <div class="col-sm-6">
    <div class="card-box">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4 font-size-16">Hồ sơ của bạn</h4>
          <div class="row">
            <div class="col-md-12">
              <div class="p-l-r-10">
                <form class="form-horizontal" role="form" action="{{route('hoso.post')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{old('email',$user->email)}}" autocomplete="off" readonly>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Họ và tên</label>
                    <input name="hoten" type="text" class="form-control" value="{{old('hoten',$user->name)}}">
                  </div>

                  <div class="form-group">
                    <button class="ladda-button btn btn-primary" data-style="expand-right">Lưu lại</button>
                    <a class="ladda-button btn btn-dark" data-style="expand-right" href="{{route('doimatkhau.get')}}"> Đổi mật khẩu </a>
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
