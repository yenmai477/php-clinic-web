@extends('index.layout.index')
@section('title')
<title>Danh sách các loại bệnh - Quản lý phòng mạch tư</title>
@endsection
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Danh sách loại bệnh</h4>

      <div class="page-title-right d-none d-lg-block">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh mục</li>
          <li class="breadcrumb-item active">Danh sách loại bệnh</li>
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
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Danh sách loại bệnh</h4>
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Ngày thêm</th>
              <th>Loại bệnh</th>
              <th>Hành động</th>
            </tr>
          </thead>

          <tbody>
            @foreach($dsLoaiBenh as $i => $detail)
            <tr>
              <td>{{$i + 1}}</td>
              <td title="{{($detail->created_at)->format('d/m/Y H:i:s')}}">
                {{($detail->created_at)->format('d/m/Y')}}</td>
              <td title="{{$detail->TenLoaiBenh}}">{{$detail->TenLoaiBenh}}</td>
              <td>
                <a href="{{route('sua-loaibenh.get',$detail->MaLoaiBenh)}}" class="btn btn-warning waves-light waves-effect" title="Sửa"> <i class="fas fa-pencil-alt"></i></a>
                &nbsp;
                &nbsp;
                <a onclick="del({{$detail->MaLoaiBenh}})" class="btn btn-danger waves-light waves-effect" title="Xóa"> <i class="fas fa-trash-alt" style="color:white"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Thêm loại bệnh</h4>
        <p class="text-muted m-b-10 font-13">
          <b>Bắt buộc</b>
          <span class="badge badge-pill badge-soft-primary font-size-11">Loại bệnh</span>
        </p>
        <div class="row">
          <div class="col-md-12">
            <div class="p-l-r-10">
              <form class="form-horizontal" role="form" action="{{route('them-loaibenh.post')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                  <label class="control-label">Loại bệnh</label>
                  <input name="tenloaibenh" type="text" class="form-control" value="{{old('tenloaibenh')}}" placeholder="Nhập tên loại bệnh..." required>
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
      content: "Hành động này sẽ xóa dữ liệu của loại bệnh này. Bạn có chắc muốn xóa không?",
      title: "Xác nhận xóa",
      type: 'red',
      typeAnimated: true,
      buttons: {
        confirmButton: {
          text: "Có hãy xóa",
          btnClass: "btn-danger",
          action: function(button) {
            window.location.assign("loaibenh/xoa/" + id);
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


      "drawCallback": function() {
        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
      },
      "columnDefs": [{
        "className": "text-center",
        "targets": [0, 1]
      }, ],
      //                        "paging":   false,
      "ordering": false,
      //                        "info":     false,
      "bFilter": false
    });
  });
</script>
@endsection
