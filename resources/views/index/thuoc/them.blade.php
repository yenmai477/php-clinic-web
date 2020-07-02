@extends('index.layout.index')
@section('title')
<title>Thêm thuốc - Quản lý phòng mạch tư</title>
@endsection
@section('style')
<!-- <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
<link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="row d-print-none">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Thêm thuốc</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
          </li>
          <li class="breadcrumb-item active">Thuốc</li>
          <li class="breadcrumb-item active">Thêm thuốc</li>
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
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">
          Thêm thuốc
        </h4>
        <p class="text-muted m-b-10 font-13">
          <b>Bắt buộc: </b>
          <span class="badge badge-pill badge-soft-primary font-size-11">Tên thuốc</span>
          <span class="badge badge-pill badge-soft-primary font-size-11">Đơn giá</span>
          <span class="badge badge-pill badge-soft-primary font-size-11">Đơn vị</span>
          <span class="badge badge-pill badge-soft-primary font-size-11">Cách dùng</span>
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="p-l-r-10">
              <form class="form-horizontal" role="form" action="{{route('them-thuoc.post')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                  <label class="control-label">Tên thuốc</label>
                  <input name="tenthuoc" type="text" class="form-control" value="{{old('tenthuoc')}}" placeholder="Nhập tên thuốc..." required>
                </div>

                <div class="form-group">
                  <label class="control-label">Số lượng thuốc nhập vào</label>
                  <input name="soluongnhap" type="number" class="form-control" value="{{old('soluongnhap')}}" placeholder="Nhập số lượng thuốc nhập vào..." required>
                </div>

                <div class="form-group">
                  <label class="control-label">Đơn giá (VND)</label>
                  <input name="dongia" type="number" class="form-control" value="{{old('dongia')}}" placeholder="Nhập đơn giá..." required>
                </div>

                <div class="form-group">
                  <label class="control-label">Đơn vị</label>
                  <select class="form-control" data-style="btn-default btn-custom" id="donvi" name="donvi">
                    <option value="" selected>--- Chọn đơn vị ---</option>
                    @foreach($dsDonVi as $detail)
                    <option value="{{$detail->MaDonVi}}" @if (old('donvi')==$detail->MaDonVi) selected @endif>
                      {{$detail->TenDonVi}}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Cách dùng</label>
                  <select class="form-control" data-style="btn-default btn-custom" id="cachdung" name="cachdung">
                    <option value="">--- Chọn cách dùng ---</option>
                    @foreach($dsCachDung as $detail)
                    <option value="{{ $detail->MaCachDung }}" @if (old('cachdung')==$detail->MaCachDung) selected @endif>
                      {{ $detail->CachDung }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary" data-style="pull-right">Lưu lại
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

@section('script-ori')
<script src="assets/plugins/switchery/js/switchery.min.js"></script>
@endsection

@section('script')

@endsection
