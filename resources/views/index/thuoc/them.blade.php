@extends('index.layout.index')
@section('title')
    <title>Thêm thuốc mới - Quản lý phòng mạch tư</title>
@endsection
@section('style')
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
                    <a href="{{route('ds-thuoc.get')}}">Danh sách thuốc</a>
                </li>
                <li class="active">
                    Thêm thuốc mới
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
                <h4 class="m-t-0 header-title"><b>Thêm thuốc mới</b></h4>
                <p class="text-muted m-b-10 font-13">
                    <b>Bắt buộc</b> <code>Tên thuốc</code> <code>Đơn giá</code> <code>Đơn vị</code> <code>Cách
                        dùng</code>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('them-thuoc.post')}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Tên thuốc</label>
                                    <input name="tenthuoc" type="text" class="form-control" value="{{old('tenthuoc')}}"
                                           placeholder="Nhập tên thuốc..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Số lượng thuốc nhập vào</label>
                                    <input name="soluongnhap" type="number" class="form-control" value="{{old('soluongnhap')}}"
                                           placeholder="Nhập số lượng thuốc nhập vào..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Đơn giá (VND)</label>
                                    <input name="dongia" type="number" class="form-control" value="{{old('dongia')}}"
                                           placeholder="Nhập đơn giá..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Đơn vị</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="donvi"
                                            name="donvi">
                                        <option value="" selected>--- Chọn đơn vị ---</option>
                                        @foreach($dsDonVi as $detail)
                                            <option value="{{$detail->MaDonVi}}" @if (old('donvi') == $detail->MaDonVi) selected @endif>
                                                {{$detail->TenDonVi}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Cách dùng</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="cachdung"
                                            name="cachdung">
                                        <option value="">--- Chọn cách dùng ---</option>
                                        @foreach($dsCachDung as $detail)
                                            <option value="{{ $detail->MaCachDung }}" @if (old('cachdung') == $detail->MaCachDung) selected @endif>
                                                {{ $detail->CachDung }}
                                            </option>
                                        @endforeach
                                    </select>
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