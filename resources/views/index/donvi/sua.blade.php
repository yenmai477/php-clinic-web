@extends('index.layout.index')
@section('title')
<title>Sửa đơn vị {{$DonVi->TenDonVi}} - Quản lý phòng mạch tư</title>
@endsection

@section('style')
@endsection

@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Sửa đơn vị</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
          </li>
          <li class="breadcrumb-item active">Danh mục</li>
          <li class="breadcrumb-item active"><a href="{{route('ds-donvi.get')}}">Danh sách đơn vị</a></li>
          <li class="breadcrumb-item active">Sửa đơn vị</li>
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
          Sửa đơn vị {{$DonVi->TenDonVi}}
        </h4>
        <p class="text-muted m-b-10 font-13">
          <b>Bắt buộc: </b>
          <span class="badge badge-pill badge-soft-primary font-size-11">Tên đơn vị</span>
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="p-l-r-10">
              <form class="form-horizontal" role="form" action="{{route('sua-donvi.post',[$DonVi->MaDonVi])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                  <label class="control-label">Tên đơn vị</label>
                  <input name="tendonvi" type="text" class="form-control" value="{{old('tendonvi',$DonVi->TenDonVi)}}" placeholder="Nhập tên đơn vị..." required>
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

@endsection

@section('script')

@endsection
