@extends('index.layout.index')
@section('title')
    <title>Danh sách khám bệnh - Quản lý phòng mạch tư</title>
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

    <link href="assets/css/cssdate.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li class="active">
                    Danh sách khám bệnh
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
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Danh sách khám bệnh</b></h4>
                <div class="form-group date">
                    {{csrf_field()}}
                    <label>Ngày khám</label><br>
                    <input class="input-small datepicker hasDatepicker" id="ngaykham" type="date" name="ngaykham"
                           onchange="abc(this.value)" value="{{date("Y-m-d")}}">
                    <button class="ladda-button btn btn-success pull-right hidden-print" data-style="expand-right"
                            onclick="ExportExcel()">
                        <i class="fa fa-file-excel-o"></i> Xuất Excel
                    </button>
                </div>

                <div class="p-10">
                    <table class="table table-striped table-bordered m-0">
                        <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Năm sinh</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center hidden-print">Đơn thuốc</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center" id="tbodydskhambenh">
                        @foreach($dsKhamBenh as $i => $detail)
                            <tr>
                                <td>{{$i + 1}}</td>
                                <td>{{$detail->benhnhan->HoTen}}</td>
                                <td>
                                    @if ($detail->benhnhan->GioiTinh == 0)
                                        Nữ
                                    @elseif($detail->benhnhan->GioiTinh == 1)
                                        Nam
                                    @else
                                        Khác
                                    @endif
                                </td>
                                <td>{{$detail->benhnhan->NamSinh}}</td>
                                <td>{{$detail->benhnhan->DiaChi}}</td>
                                <td class="hidden-print">
                                    <a href="{{route("ct-phieukham.get",[$detail->MaPKB])}}" target="_blank"
                                       class="btn btn-icon waves-effect waves-light btn-success"
                                       title="Chi tiết đơn thuốc">
                                        Đơn thuốc
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="hidden-print p-t-10">
                    <div class="pull-right">
                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i
                                    class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-ori')
@endsection
@section('script')
    <script>
        function abc(value) {
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "{{route('ajax-ds-khambenh.get')}}",
                type: "GET",
                async: true,
                data: {"_token": token, "key": value},
                success: function (data) {
                    $("#tbodydskhambenh").html(data);
                }
            });
        }

        function ExportExcel() {
            var ngay = $('#ngaykham').val();
            window.location.assign("phieukham/xuatexcel/" + ngay);
        }
    </script>
@endsection