@extends('index.layout.index')
@section('title')
    <title>Danh sách phiếu khám bệnh - Quản lý phòng mạch tư</title>
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
                    Danh sách phiếu khám bệnh
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
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{route('them-phieukham.get')}}">
                    <button class="ladda-button btn btn-default waves-effect waves-light" data-style="expand-right">
                        <span class="btn-label"><i class="fa fa-plus"></i></span>Thêm phiếu khám bệnh
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Danh sách phiếu khám bệnh</b></h4>
                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
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
                            <td title="Click vào bệnh nhân để sửa"><a target="_blank"
                                                                      href="{{route('sua-benhnhan.get',[$detail->benhnhan->MaBN])}}">{{$detail->benhnhan->HoTen}}</a>
                            </td>
                            <td>{{$detail->TrieuChung}}</td>
                            <td>{{$detail->loaibenh->TenLoaiBenh}}</td>
                            <td>
                                <a href="{{route("ct-phieukham.get",[$detail->MaPKB])}}" target="_blank"
                                   class="btn btn-icon waves-effect waves-light btn-success" title="Chi tiết đơn thuốc">
                                    Đơn thuốc
                                </a> &nbsp;&nbsp;

                                {{--<a href="{{route("hd-phieukham.get",[$detail->MaPKB])}}" target="_blank"--}}
                                {{--class="btn btn-icon waves-effect waves-light btn-inverse" title="Hóa đơn thanh toán">--}}
                                {{--Hóa đơn--}}
                                {{--</a> &nbsp;&nbsp;--}}

                                <a href="{{route('sua-phieukham.get',[$detail->MaPKB])}}"
                                   class="btn btn-icon waves-effect waves-light btn-warning
                                            @if (date('Y-m-d') != $detail->NgayKham)
                                           disabled
                                           @endif
                                           " title="Sửa"> <i
                                            class="fa fa-wrench"></i></a>
                                &nbsp;
                                &nbsp;
                                <a onclick="del({{$detail->MaPKB}})"
                                   class="btn btn-icon waves-effect waves-light btn-danger
                                            @if (date('Y-m-d') != $detail->NgayKham)
                                           disabled
@endif
                                           " title="Xóa"> <i
                                            class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
                text: "Hành động này sẽ xóa dữ liệu của phiếu khám bệnh này <br/><a style='color: red'>(bao gồm đơn thuốc và hóa đơn)</a>.<br/>Bạn có chắc muốn xóa không?",
                title: "Xác nhận xóa",
                confirmButton: "Có, hãy xóa",
                cancelButton: "Không, đừng xóa",
                post: false,
                submitForm: false,
                confirmButtonClass: "btn-danger",
                cancelButtonClass: "btn-default",
                dialogClass: "modal-dialog",
                confirm: function (button) {
                    window.location.assign("phieukham/xoa/" + id);
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
                            "targets": [0, 1, 2, 3, 4]
                        }
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