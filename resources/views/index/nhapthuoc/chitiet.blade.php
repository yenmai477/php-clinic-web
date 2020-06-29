@extends('index.layout.index')
@section('title')
<title>Phiếu nhập thuốc #{{$PNT->MaPNT}} - Quản lý phòng mạch tư</title>
@endsection
@section('style')
<link href="tp_ad/assets/plugins/custombox/css/custombox.css" rel="stylesheet">
<link href="tp_ad/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="tp_ad/assets/css/csscustom.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Chi tiết phiếu nhập thuốc</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh mục</li>
          <li class="breadcrumb-item active">Nhập thuốc</li>
          <li class="breadcrumb-item active">Chi tiết phiếu nhập thuốc</li>
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

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">PHIẾU NHẬP THUỐC</h4>
        <hr />
        <div class="col-md-2">
        </div>
        <div class="col-md-4">

          <div class="pull-left m-t-0">
            <address style="font-size: 1.25em">
              <strong>Ngày nhập: </strong> {{date_format(date_create($PNT->NgayNhap),'d/m/Y')}} <br>
              <strong style="line-height: 2.5;">Số loại thuốc nhập: </strong>
              {{$PNT->SoLoaiThuocNhap}}<br>
            </address>
          </div>

        </div>
        <div class="col-md-4">

          <div class="pull-right m-t-0">
            <address style="font-size: 1.25em">
              <strong>Mã phiếu nhập thuốc: </strong> #{{$PNT->MaPNT}}
            </address>
          </div>
        </div>
        <div class="col-md-3"></div>


        <div class="m-h-0"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table m-t-0 table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Thuốc</th>
                    <th class="text-center">Đơn vị</th>
                    <th class="text-center">Số lượng nhập</th>
                    <th class="text-center">Đơn giá nhập</th>
                    <th class="text-center">Thành tiền</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php $i = 0; ?>
                  @foreach($PNT->chitietpnt as $detail)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$detail->thuoc->TenThuoc}}</td>
                    <td>{{$detail->thuoc->donvi->TenDonVi}}</td>
                    <td>{{$detail->SoLuongNhap}}</td>
                    <td>{{number_format($detail->DonGiaNhap)}}</td>
                    <td>{{number_format($detail->ThanhTien)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row" style="border-radius: 0px;">
          <div class="col-md-9"></div>
          <div class="col-md-3 pull-right">
            <br />
            {{--<p class="text-left"><b>Tiền khám:</b> {{number_format($PKB->hoadon->TienKham)}} VND</p>--}}
            {{--<p class="text-left"><b>Tiền thuốc:</b> {{number_format($PKB->hoadon->TienThuoc)}} VND</p>--}}
            <hr>
            <h3 class="text-right">{{number_format($PNT->TongTienNhap)}} VND</h3>
          </div>
        </div>
        <hr>
        <div class="d-print-none">
          <div class="float-right">
            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
