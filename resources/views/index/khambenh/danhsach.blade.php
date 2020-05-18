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
                </div>

                <div class="p-10">
                    <table class="table table-striped table-bordered m-0">
                        <thead>
                        <tr>
                            <th class="text-center">STT a</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Năm sinh</th>
                            <th class="text-center">Địa chỉ</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center" id="tbodydskhambenh">
                        <?php $i = 0; ?>
                        @foreach($dskhambenh as $bn)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$bn->benhnhan->HoTen}}</td>
                                <td>
                                    @if ($bn->benhnhan->GioiTinh == 0)
                                        Nữ
                                    @elseif($bn->benhnhan->GioiTinh == 1)
                                        Nam
                                    @else
                                        Khác
                                    @endif
                                </td>
                                <td>{{$bn->benhnhan->NamSinh}}</td>
                                <td>{{$bn->benhnhan->DiaChi}}</td>
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
    </script>
@endsection