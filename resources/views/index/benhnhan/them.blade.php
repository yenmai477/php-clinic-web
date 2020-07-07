@extends('index.layout.index')
@section('title')
<title>Thêm bệnh nhân - Quản lý phòng mạch tư</title>
@endsection
@section('style')
<!-- <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" /> -->
@endsection
@section('content')
<div class="row d-print-none">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Thêm bệnh nhân</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
          </li>
          <li class="breadcrumb-item active">Bệnh nhân</li>
          <li class="breadcrumb-item active">Thêm bệnh nhân</li>
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
  {!! session('success')!!}
</div>
@endif

<!--end duong dan nho-->

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <a href="{{route('them-phieukham.get')}}">
        <button class="btn btn-primary waves-effect waves-light">
          <i class="font-size-16 align-middle mr-2 fa fa-plus"></i>Thêm phiếu khám bệnh
        </button>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">Thêm bệnh nhân</h4>
        <p class="text-muted m-b-10 font-13">
          <b>Bắt buộc</b>
          <span class="badge badge-pill badge-soft-primary font-size-11">Họ & tên</span>
          <span class="badge badge-pill badge-soft-primary font-size-11">Giới tính</span>
          <span class="badge badge-pill badge-soft-primary font-size-11">Năm sinh</span>
          <span class="badge badge-pill badge-soft-primary font-size-11">Địa chỉ</span>
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="p-l-r-10">
              <form class="form-horizontal" role="form" action="{{route('them-benhnhan.post')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                  <label class="control-label">Họ & tên</label>
                  <input name="hoten" type="text" class="form-control" value="{{old('hoten')}}" placeholder="Nhập họ tên..." required>
                </div>

                <div class="form-group">
                  <label class="control-label">Giới tính</label>
                  <select class="form-control" data-style="btn-default btn-custom" id="gioitinh" name="gioitinh">
                    <option value="" selected>--- Chọn giới tính ---</option>
                    <option value="1" @if (old('gioitinh')==1) selected @endif>Nữ</option>
                    <option value="2" @if (old('gioitinh')==2) selected @endif>Nam</option>
                    <option value="3" @if (old('gioitinh')==3) selected @endif>Khác</option>
                  </select>
                </div>


                <div class="form-group">
                  <label class="control-label">Năm sinh</label>
                  <select class="form-control" data-style="btn-default btn-custom" id="namsinh" name="namsinh">
                    <option value="">--- Chọn năm sinh ---</option>
                    @for($i=date("Y") * 1;$i>=date("Y") * 1 - 100;$i--)
                    <option value="{{ $i }}" @if (old('namsinh')==$i) selected @endif>{{ $i }}</option>
                    @endfor
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Địa chỉ</label>
                  <input name="diachi" type="text" class="form-control" value="{{old('diachi')}}" placeholder="Nhập địa chỉ..." required>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary" data-style="expand-right">Lưu lại
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

@endsection

@section('script')

@endsection
