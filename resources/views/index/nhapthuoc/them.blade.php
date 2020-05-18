@extends('index.layout.index')
@section('title')
    <title>Thêm phiếu nhập thuốc - Quản lý phòng mạch tư</title>
@endsection
@section('style')
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"/>
    <link href="assets/css/cssdate.css" rel="stylesheet" type="text/css">
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
                <li>
                    <a href="{{route('ds-pnt.get')}}">Danh sách phiếu nhập thuốc</a>
                </li>
                <li class="active">
                    Thêm phiếu nhập thuốc
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
                <a href="{{route('them-thuoc.get')}}">
                    <button class="ladda-button btn btn-default waves-effect waves-light" data-style="expand-right">
                        <span class="btn-label"><i class="fa fa-plus"></i></span>Thêm thuốc mới
                    </button>
                </a>
            </div>
        </div>
    </div>

    <form class="form-horizontal" role="form" action="{{route('them-pnt.post')}}"
          method="post">
        {{csrf_field()}}

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Thêm phiếu nhập thuốc</b></h4>

                    <div class="form-group date p-l-r-10">
                        <label>Ngày nhập thuốc</label><br>
                        <input class="input-small datepicker hasDatepicker" id="ngaykham" type="date"
                               name="ngaynhap" value="{{date('Y-m-d')}}">
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
                                        <input name="{{$detail->MaThuoc}}" type="number" class="form-control soluong"
                                               placeholder="Số lượng..." maxlength="4"
                                               value="{{old($detail->MaThuoc)}}">
                                    </td>
                                    <td class="text-center">
                                        <input name="dongia{{$detail->MaThuoc}}" type="number" class="form-control dongia"
                                               placeholder="Đơn giá nhập..." maxlength="7"
                                               value="{{old("dongia".$detail->MaThuoc)}}">
                                    </td>
                                    <td class="text-center">{{$detail->donvi->TenDonVi}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="p-l-r-10 p-t-10">
                        <div class="form-group">
                            <button class="ladda-button btn btn-default" data-style="expand-right">
                                Lưu lại
                            </button>
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
                    "bFilter": true
                }
            );

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