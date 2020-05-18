@extends('index.layout.index')
@section('title')
    <title>Sửa bệnh nhân {{$BenhNhan->HoTen}} - Quản lý phòng mạch tư</title>
@endsection
@section('style')
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet"/>
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li>
                    <a href="{{route('ds-benhnhan.get')}}">Danh sách bệnh nhân</a>
                </li>
                <li class="active">
                    Sửa bệnh nhân {{$BenhNhan->HoTen}}
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
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Sửa bệnh nhân {{$BenhNhan->HoTen}}</b></h4>
                <p class="text-muted m-b-10 font-13">
                    <b>Bắt buộc</b> <code>Họ & tên</code> <code>Giới tính</code> <code>Năm sinh</code> <code>Địa chỉ</code>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('sua-benhnhan.post',[$BenhNhan->MaBN])}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Họ & tên</label>
                                    <input name="hoten" type="text" class="form-control" value="{{old('hoten',$BenhNhan->HoTen)}}"
                                           placeholder="Nhập họ tên..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Giới tính</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="gioitinh"
                                            name="gioitinh">
                                        <option value="" selected>--- Chọn giới tính ---</option>
                                        <option value="1" @if (old('gioitinh',$BenhNhan->GioiTinh) == 1) selected @endif>Nữ</option>
                                        <option value="2" @if (old('gioitinh',$BenhNhan->GioiTinh) == 2) selected @endif>Nam</option>
                                        <option value="3" @if (old('gioitinh',$BenhNhan->GioiTinh) == 3) selected @endif>Khác</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Năm sinh</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="namsinh"
                                            name="namsinh">
                                        <option value="">--- Chọn năm sinh ---</option>
                                        @for($i=2018;$i>=1920;$i--)
                                            <option value="{{ $i }}" @if (old('namsinh',$BenhNhan->NamSinh) == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    <input name="diachi" type="text" class="form-control" value="{{old('diachi',$BenhNhan->DiaChi)}}"
                                           placeholder="Nhập địa chỉ..." required>
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
    <script src="assets/plugins/switchery/js/switchery.min.js"></script>
@endsection
@section('script')

@endsection