@extends('index.layout.index')
@section('title')
<title>Thêm phiếu nhập thuốc - Quản lý phòng mạch tư</title>
@endsection
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Thêm phiếu nhập thuốc</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh mục</li>
          <li class="breadcrumb-item active"><a href="{{route('ds-pnt.get')}}">Nhập thuốc</a></li>
          <li class="breadcrumb-item active">Thêm phiếu nhập thuốc</li>
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
<div class=" alert alert-success">
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
          <i class="font-size-16 align-middle mr-2 fa fa-plus"></i>Thêm thuốc mới
        </button>
      </a>
    </div>
  </div>
</div>

<form id="form-datatable" class="form-horizontal" role="form" action="{{route('them-pnt.post')}}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Thêm phiếu nhập thuốc</h4>
          <div class="form-group date p-l-r-10">
            <label>Ngày nhập thuốc</label><br>
            <input class="input-small datepicker hasDatepicker" id="ngaykham" type="date" name="ngaynhap" value="{{date('Y-m-d')}}" readonly>
          </div>

          <div class="p-10">
            <table id="datatable-responsive" class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">STT</th>
                  <th class="text-center">Thuốc</th>
                  <th class="text-center">Số lượng còn lại</th>
                  <th class="text-center">Số lượng</th>
                  <th class="text-center">Đơn giá nhập</th>
                  <th class="text-center">Đơn vị</th>
                </tr>
              </thead>
              <tbody style="text-align: center">
                @foreach($dsThuoc as $i => $detail)
                <tr>
                  <td class="text-center">{{$i + 1}}</td>
                  <td class="text-center tenthuoc">{{$detail->TenThuoc}}</td>
                  <td class="text-center slconlai">
                    @if ($detail->SoLuongConLai == 0)
                    <b style="color: red">{{$detail->SoLuongConLai}}</b>
                    @else
                    <b style="color: green">{{$detail->SoLuongConLai}}</b>
                    @endif
                  </td>
                  <td class="text-center">
                    <input name="{{$detail->MaThuoc}}" type="number" class="form-control soluong" placeholder="Số lượng..." maxlength="4" value="{{old($detail->MaThuoc)}}">
                  </td>
                  <td class="text-center">
                    <input name="dongia{{$detail->MaThuoc}}" type="number" class="form-control dongia" placeholder="Đơn giá nhập..." maxlength="7" value="{{old("dongia".$detail->MaThuoc)}}">
                  </td>
                  <td class="text-center">{{$detail->donvi->TenDonVi}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="p-l-r-10 p-t-10">
            <div class="form-group">
              <button class="btn btn-primary" data-style="expand-right">Lưu lại
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
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
  // function checkSLConLai() {
  //     // if (slConLai < slNhap)
  //     // {
  //         var tenThuoc = $(this).parent().find("").val();
  //         alert(tenThuoc)
  //     // }
  //         // alert("Thuốc không đủ dùng")
  // }
  $(document).ready(function() {
    var table = $('#datatable-responsive').DataTable({
      "language": {
        "sSearch": "Tìm kiếm: ",
        "sInfo": "Dòng _START_ đến  _END_ trong tổng  _TOTAL_ dòng",
        "sLengthMenu": "Hiển thị _MENU_ dòng",
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
        "targets": [0, 1, 2, 3, 4]
      }],
      //                        "paging":   false,
      "ordering": false,
      //                        "info":     false,
      "bFilter": true,

    });


    // $(".soluong").on('change', function () {
    //     var soLuongNhap = $(this).val();
    //     var soLuongConLai = parseInt($(this).parent().parent().find(".slconlai").text());
    //     if (soLuongNhap > soLuongConLai) {
    //         var tenThuoc = $(this).parent().parent().find(".tenthuoc").text();
    //         alert("Thuốc " + tenThuoc + " không đủ dùng")
    //         // alert(soLuongConLai)
    //     }
    // });
  });
</script>
@endsection
