@extends('index.layout.index')
@section('title')
    <title>Hóa đơn thanh toán của bệnh nhân {{$PKB->benhnhan->HoTen}} - Quản lý phòng mạch tư</title>
@endsection
@section('style')
    <link href="tp_ad/assets/plugins/custombox/css/custombox.css" rel="stylesheet">
    <link href="tp_ad/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="tp_ad/assets/css/csscustom.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li>
                    <a href="{{route('ds-phieukham.get')}}">Danh sách phiếu khám bệnh</a>
                </li>
                <li class="active">
                    Hóa đơn thanh toán
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="text-center">
                            <h3>HÓA ĐƠN THANH TOÁN</h3>
                        </div><hr/>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">

                            <div class="pull-left m-t-0">
                                <address style="font-size: 1.25em">
                                    <strong>Họ & tên: </strong> {{$PKB->benhnhan->HoTen}} <br>
                                    <strong style="line-height: 2.5;">Tiền khám: </strong> {{number_format($PKB->hoadon->TienKham)}} VND<br>
                                </address>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="pull-right m-t-0">
                                <address style="font-size: 1.25em">
                                    <strong>Ngày
                                        khám: </strong> {{date_format(date_create($PKB->NgayKham),'d/m/Y')}}
                                    <br/>
                                    <strong style="line-height: 2.5;">Tiền thuốc: </strong> {{number_format($PKB->hoadon->TienThuoc)}} VND<br>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="hidden-print">
                        <div class="pull-right">
                            <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i
                                        class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection