@extends('index.layout.index')
@section('title')
    <title>Hồ sơ - Quản lý phòng mạch tư</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li class="active">
                    Hồ sơ
                </li>
            </ol>
        </div>
    </div>
    <!--end duong dan nho-->

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
            {{session('thongbao')}}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Hồ sơ của bạn</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('hoso.post')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input name="email" type="email" class="form-control" value="{{old('email',$user->email)}}" autocomplete="off" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Họ và tên</label>
                                    <input name="hoten" type="text" class="form-control" value="{{old('hoten',$user->name)}}">
                                </div>

                                <div class="form-group">
                                    <button class="ladda-button btn btn-default" data-style="expand-right">Lưu lại</button>
                                    <a class="ladda-button btn btn-inverse" data-style="expand-right" href="{{route('doimatkhau.get')}}"> Đổi mật khẩu </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection