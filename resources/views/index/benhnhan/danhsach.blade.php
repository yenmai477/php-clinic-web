@extends('index.layout.index')
@section('title')
<title>Danh sách bệnh nhân - Quản lý phòng mạch tư</title>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Danh sách bệnh nhân</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Bệnh nhân</li>
          <li class="breadcrumb-item active">Danh sách bệnh nhân</li>
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
      <a href="{{route('them-benhnhan.get')}}">
        <button class="btn btn-primary waves-effect waves-light">
          <i class="font-size-16 align-middle mr-2 fa fa-plus"></i>Thêm bệnh nhân
        </button>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">Danh sách bệnh nhân</h4>
        <div class="card-box table-responsive dvData">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Năm sinh</th>
                <th>Địa chỉ</th>
                <th>Hành động</th>
              </tr>
            </thead>

            <tbody>
              @foreach($dsBenhNhan as $i => $detail)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{$detail->HoTen}}</td>
                <td>
                  @if($detail->GioiTinh == 1)
                  Nữ
                  @elseif($detail->GioiTinh == 2)
                  Nam
                  @else
                  Khác
                  @endif
                </td>
                <td>{{$detail->NamSinh}}</td>
                <td>{{$detail->DiaChi}}</td>
                <td>
                  <!-- <a class="btn btn-primary btn-rounded mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route("sua-benhnhan.get",[$detail->MaBN])}}"><i class="mdi mdi-pencil font-size-18"></i></a> -->
                  <!-- <a href="javascript:void(0);" onclick="del({{$detail->MaBN}})" class="btn btn-danger btn-rounded" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a> -->
                  <a href="{{route("sua-benhnhan.get",[$detail->MaBN])}}" class="btn btn-warning waves-light waves-effect" title="Sửa"><i class="fas fa-pencil-alt"></i></a>
                  &nbsp;
                  &nbsp;
                  <a onclick="del({{$detail->MaBN}})" class="btn btn-danger waves-light waves-effect " title="Xóa"> <i class="fas fa-trash-alt" style="color:white"></i></a>

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
      content: "Hành động này sẽ xóa dữ liệu của bệnh nhân này. Bạn có chắc muốn xóa không?",
      title: "Xác nhận xóa",
      type: 'red',
      typeAnimated: true,
      buttons: {
        confirmButton: {
          text: "Có hãy xóa",
          btnClass: "btn-danger",
          action: function(button) {
            window.location.assign("benhnhan/xoa/" + id);
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
      "bFilter": false,
      "drawCallback": function() {
        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
      }
    });
  });
</script>
@endsection
