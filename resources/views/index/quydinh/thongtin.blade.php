@extends('index.layout.index')
@section('title')
    <title>Thông tin phòng khám - Quản lý phòng khám</title>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li class="active">
                    Thông tin phòng khám
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
        <div class="col-sm-6">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Thông tin phòng khám</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('ttpk.post')}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Tên phòng khám</label>
                                    <input name="tenpk" type="text" class="form-control" value="{{old('tenpk',$TenPK->GiaTri)}}" placeholder="Nhập tên phòng khám...">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tên bác sĩ</label>
                                    <input name="tenbs" type="text" class="form-control" value="{{old('tenbs',$TenBS->GiaTri)}}" placeholder="Nhập tên bác sĩ...">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    <input name="diachi" type="text" class="form-control" value="{{old('diachi',$DiaChi->GiaTri)}}" placeholder="Nhập địa chỉ...">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Số điện thoại</label>
                                    <input name="sdt" type="text" class="form-control" value="{{old('sdt',$SDT->GiaTri)}}" placeholder="Nhập số điện thoại...">
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

@endsection
@section('script')

@endsection