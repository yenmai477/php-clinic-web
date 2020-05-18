@extends('index.layout.index')
@section('title')
    <title>Sửa loại bệnh {{$LoaiBenh->TenLoaiBenh}} - Quản lý phòng mạch tư</title>
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
                <li>
                    <a href="{{route('ds-loaibenh.get')}}">Danh sách loại bệnh</a>
                </li>
                <li class="active">
                    Sửa loại bệnh {{$LoaiBenh->TenLoaiBenh}}
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
                <h4 class="m-t-0 header-title"><b>Sửa loại bệnh {{$LoaiBenh->TenLoaiBenh}}</b></h4>
                <p class="text-muted m-b-10 font-13">
                    <b>Bắt buộc</b> <code>Loại bệnh</code>
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('sua-loaibenh.post',[$LoaiBenh->MaLoaiBenh])}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Tên loại bệnh</label>
                                    <input name="tenloaibenh" type="text" class="form-control" value="{{old('tenloaibenh',$LoaiBenh->TenLoaiBenh)}}" placeholder="Nhập tên loại bệnh...">
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