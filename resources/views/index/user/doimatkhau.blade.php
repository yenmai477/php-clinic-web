@extends('index.layout.index')
@section('title')
    <title>Đổi mật khẩu - Quản lý phòng mạch tư</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li>
                    <a href="{{route("hoso.get")}}">Hồ sơ</a>
                </li>
                <li class="active">
                    Đổi mật khẩu
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
                <h4 class="m-t-0 header-title"><b>Đổi mật khẩu</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('doimatkhau.post')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">Mật khẩu hiện tại</label>
                                    <input type="password" name="passold" class="form-control" placeholder="Nhập lại mật khẩu hiện tại để xác minh." autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Mật khẩu mới</label>
                                    <input type="password" name="passnew" class="form-control" placeholder="Nhập mật khẩu mới." autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nhập lại mật khẩu mới</label>
                                    <input type="password" name="re-passnew" class="form-control" placeholder="Nhập lại mật khẩu mới." autocomplete="off">
                                </div>


                                <div class="form-group">
                                    <button class="ladda-button btn btn-default" data-style="expand-right">Đổi mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection