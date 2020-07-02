@extends('index.layout.index')
@section('title')
<title>Danh sách phiếu nhập thuốc - Quản lý phòng mạch tư</title>
@endsection
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Danh sách phiếu nhập thuốc</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh mục</li>
          <li class="breadcrumb-item active">Nhập thuốc</li>
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
      <a href="{{route('them-pnt.get')}}">
        <button class="btn btn-primary waves-effect waves-light">
          <i class="font-size-16 align-middle mr-2 fa fa-plus"></i>Thêm phiếu nhập thuốc
        </button>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Danh sách phiếu nhập thuốc</h4>
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ngày nhập</th>
              <th>Số loại thuốc nhập</th>
              <th>Tổng tiền nhập</th>
              <th>Hành động</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 0; ?>
            @foreach($dsPNT as $detail)
            <tr>
              <td>{{++$i}}</td>
              <td>{{date_format(date_create($detail->NgayNhap),'d/m/Y')}}</td>
              <td>{{$detail->SoLoaiThuocNhap}}</td>
              <td>{{number_format($detail->TongTienNhap)}} VND</td>
              <td>
                <a href="{{route("chitiet-pnt.get",[$detail->MaPNT])}}" class="btn btn-icon waves-effect waves-light btn-success" title="Chi tiết phiếu nhập thuốc">
                  Chi tiết PNT
                </a>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable-responsive').DataTable({
      "language": {
        "sInfo": "Dòng _START_ đến  _END_ trong tổng  _TOTAL_ dòng",
        "sLengthMenu": "Hiển thị _MENU_ dòng",
        "sSearch": "Tìm kiếm: ",
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      },


      "drawCallback": function() {
        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
      },
      "columnDefs": [{
        "className": "text-center",
        "targets": [0, 1, 2, 3]
      }],
      //                        "paging":   false,
      "ordering": false,
      //                        "info":     false,
      "bFilter": true
    });
  });
</script>
@endsection
