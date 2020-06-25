@extends('index.layout.index')
@section('title')
<title>Danh sách thuốc - Quản lý phòng mạch tư</title>
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Danh sách thuốc</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thuốc</li>
          <li class="breadcrumb-item active">Danh sách thuốc</li>
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
      <a href="{{route('them-thuoc.get')}}">
        <button class="btn btn-primary waves-effect waves-light">
          <i class="font-size-16 align-middle mr-2 fa fa-plus"></i>Thêm thuốc
        </button>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">Danh sách thuốc</h4>
        <div class="card-box table-responsive dvData">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên thuốc</th>
                <th>Số lượng còn lại</th>
                <th>Đơn giá</th>
                <th>Đơn vị</th>
                <th>Cách dùng</th>
                <th>Hành động</th>
              </tr>
            </thead>

            <tbody>
              @foreach($dsThuoc as $i => $detail)
              <tr>
                <td>{{$i + 1}}</td>
                <td title="{{$detail->TenThuoc}}">{{$detail->TenThuoc}}</td>
                <td title="{{$detail->SoLuongConLai}}">{{$detail->SoLuongConLai}}</td>
                <td title="{{number_format($detail->DonGia)}} VND">{{number_format($detail->DonGia)}} VND
                </td>
                <td title="{{$detail->donvi->TenDonVi}}">{{$detail->donvi->TenDonVi}}</td>
                <td title="{{$detail->cachdung->CachDung}}">{{$detail->cachdung->CachDung}}</td>
                <td>
                  <a href="{{route("sua-thuoc.get",[$detail->MaThuoc])}}" class="btn btn-icon waves-effect waves-light btn-warning" title="Sửa"> <i class="fas fa-pencil-alt"></i></a>
                  &nbsp;
                  &nbsp;
                  <a onclick="del({{$detail->MaThuoc}})" class="btn btn-icon waves-effect waves-light btn-danger" title="Xóa"> <i class="fas fa-trash-alt" style="color:white"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script-ori')

<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

@endsection

@section('script')

<script>
  function del(id) {
    $.confirm({
      icon: 'fa fa-warning',
      content: "Hành động này sẽ xóa dữ liệu của thuốc này. Bạn có chắc muốn xóa không?",
      title: "Xác nhận xóa",
      type: 'red',
      typeAnimated: true,
      buttons: {
        confirmButton: {
          text: "Có hãy xóa",
          btnClass: "btn-danger",
          action: function(button) {
            window.location.assign("thuoc/xoa/" + id);
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
      post: false,
      submitForm: false,
      theme: "bootstrap"

    });
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable-responsive').DataTable({
      "language": {
        "sSearch": "Tìm kiếm: ",
        "sInfo": "Dòng _START_ đến  _END_ trong tổng  _TOTAL_ dòng",
        "sLengthMenu": "Hiển thị _MENU_ dòng",
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      },
      "columnDefs": [{
        "className": "text-center",
        "targets": [0, 1, 2, 3, 4, 5]
      }],
      //                        "paging":   false,
      "ordering": false,
      //                        "info":     false,
      "bFilter": true,
      "drawCallback": function() {
        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
      }
    });
  });
</script>

@endsection
