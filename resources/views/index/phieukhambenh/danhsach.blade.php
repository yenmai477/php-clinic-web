@extends('index.layout.index')
@section('title')
<title>Danh sách phiếu khám bệnh - Quản lý phòng mạch tư</title>
@endsection
@section('style')
<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Danh sách phiếu khám bệnh</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
          </li>
          <li class="breadcrumb-item active">Phiếu khám bệnh</li>
          <li class="breadcrumb-item active">Danh sách phiếu khám bệnh</li>
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
        <h4 class="card-title mb-2">Danh sách phiếu khám bệnh</h4>
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ngày khám</th>
              <th>Bệnh nhân</th>
              <th>Triệu chứng</th>
              <th>Loại bệnh</th>
              <th>Hành động</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 0; ?>
            @foreach($dsPhieuKham as $detail)
            <tr>
              <td>{{++$i}}</td>
              <td>{{date_format(date_create($detail->NgayKham),'d/m/Y')}}</td>
              <td title="Click vào bệnh nhân để sửa"><a target="_blank" href="{{route('sua-benhnhan.get',[$detail->benhnhan->MaBN])}}">{{$detail->benhnhan->HoTen}}</a>
              </td>
              <td>{{$detail->TrieuChung}}</td>
              <td>{{$detail->loaibenh->TenLoaiBenh}}</td>
              <td>
                <a href="{{route("ct-phieukham.get",[$detail->MaPKB])}}" target="_blank" class="btn btn-icon waves-effect waves-light btn-success" title="Chi tiết đơn thuốc">
                  Đơn thuốc
                </a> &nbsp;&nbsp;

                <a href="{{route('sua-phieukham.get',[$detail->MaPKB])}}" class="btn btn-icon waves-effect waves-light btn-warning
                                            @if (date('Y-m-d') != $detail->NgayKham)
                                           disabled
                                           @endif
                                           " title="Sửa"> <i class="fas fa-pencil-alt"></i></a>
                &nbsp;
                &nbsp;
                <a onclick="del({{$detail->MaPKB}})" class="btn btn-icon waves-effect waves-light btn-danger
                                            @if (date('Y-m-d') != $detail->NgayKham)
                                           disabled
@endif
                                           " title="Xóa"> <i class="fas fa-trash-alt" style="color:white"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  function del(id) {
    $.confirm({
      content: "Hành động này sẽ xóa dữ liệu của phiếu khám bệnh này <a style='color: red'>(bao gồm đơn thuốc và hóa đơn)</a>.<br/>Bạn có chắc muốn xóa không?",
      title: "Xác nhận xóa",
      type: "red",
      typeAnimated: true,
      post: false,
      submitForm: false,
      buttons: {
        confirmButton: {
          text: "Có hãy xóa",
          btnClass: "btn-danger",
          action: function(button) {
            window.location.assign("phieukham/xoa/" + id);
          },
        },
        cancelButton: {
          text: "Không, đừng xóa",
          btnClass: "btn-default",
          action: function(button) {
            console.log("cancel!");

          }
        },
      },
    });
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable-responsive').DataTable({
      "language": {
        "sInfo": "Dòng _START_ đến  _END_ trong tổng  _TOTAL_ dòng",
        "sLengthMenu": "Hiển thị _MENU_ dòng",
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      },
      "columnDefs": [{
        "className": "text-center",
        "targets": [0, 1, 2, 3, 4]
      }],
      //                        "paging":   false,
      "ordering": false,
      //                        "info":     false,
      "bFilter": false,
      "drawCallback": function() {
        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
      }
    });
  });
</script>
@endsection
