@extends('index.layout.index')
@section('title')
    <title>Danh sách các đơn vị tính - Quản lý phòng mạch tư</title>
@endsection
@section('style')
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li class="active">
                    Danh sách đơn vị tính
                </li>
            </ol>
        </div>
    </div>

    @if (count($errors) > 0 || session('error'))
        <div class="alert alert-danger" role="alert">
            <strong>Cảnh báo!</strong><br>
            @foreach($errors->all() as $err)
                {{$err}}<br/>
            @endforeach
            {{session('error')}}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Thành công!</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
            <br/>
            {{session('success')}}
        </div>
    @endif
    <!--end duong dan nho-->
    <div class="row">
        <div class="col-sm-8">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Danh sách đơn vị tính</b></h4>
                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        {{--<th>#ID</th>--}}
                        <th>Ngày thêm</th>
                        <th>Tên đơn vị</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($dsDonVi as $detail)
                        <tr>
                            <td title="{{($detail->created_at)->format('d/m/Y H:i:s')}}">{{($detail->created_at)->format('d/m/Y')}}</td>
                            <td title="{{$detail->TenDonVi}}">{{$detail->TenDonVi}}</td>
                            <td>
                                <a href="{{route('sua-donvi.get',$detail->MaDonVi)}}" class="btn btn-icon waves-effect waves-light btn-warning" title="Sửa"> <i class="fa fa-wrench"></i></a>
                                &nbsp;
                                &nbsp;
                                <a onclick="del({{$detail->MaDonVi}})"
                                   class="btn btn-icon waves-effect waves-light btn-danger" title="Xóa"> <i
                                            class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Thêm đơn vị</b></h4>
                <p class="text-muted m-b-10 font-13">
                    Thêm một đơn vị mới.<br/><b>Bắt buộc</b> <code>Tên đơn vị</code>
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('them-donvi.post')}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Tên đơn vị</label>
                                    <input name="tendonvi" type="text" class="form-control" value="{{old('tendonvi')}}" placeholder="Nhập tên đơn vị..." required>
                                </div>

                                <div class="form-group">
                                    <button class="ladda-button btn btn-default" data-style="expand-right">Lưu lại
                                    </button>
                                </div>
                            </form>
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
                text: "Hành động này sẽ xóa dữ liệu của đơn vị này. Bạn có chắc muốn xóa không?",
                title: "Xác nhận xóa",
                confirmButton: "Có, hãy xóa",
                cancelButton: "Không, đừng xóa",
                post: false,
                submitForm: false,
                confirmButtonClass: "btn-danger",
                cancelButtonClass: "btn-default",
                dialogClass: "modal-dialog",
                confirm: function (button) {
                    window.location.assign("donvi/xoa/" + id);
                },
                cancel: function (button) {
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable-responsive').DataTable(
                    {
                        "columnDefs": [
                            {
                                "className": "text-center",
                                "targets": [0, 1]
                            },
                        ],
//                        "paging":   false,
                        "ordering": false,
//                        "info":     false,
                        "bFilter": false
                    }
            );
        });
    </script>
@endsection