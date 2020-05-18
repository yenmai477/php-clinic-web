@extends('index.layout.index')
@section('title')
    <title>Sửa cách dùng {{$CachDung->CachDung}} - Quản lý phòng mạch tư</title>
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
                    <a href="{{route('ds-cachdung.get')}}">Danh sách cách dùng</a>
                </li>
                <li class="active">
                    Sửa cách dùng {{$CachDung->CachDung}}
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
                <h4 class="m-t-0 header-title"><b>Sửa cách dùng {{$CachDung->CachDung}}</b></h4>
                <p class="text-muted m-b-10 font-13">
                    <b>Bắt buộc</b> <code>Cách dùng</code>
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('sua-cachdung.post',[$CachDung->MaCachDung])}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Cách dùng</label>
                                    <input name="cachdung" type="text" class="form-control" value="{{old('cachdung',$CachDung->CachDung)}}" placeholder="Nhập cách dùng...">
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