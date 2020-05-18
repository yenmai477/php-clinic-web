@extends('index.layout.index')
@section('title')
    <title>Quy định - Quản lý phòng mạch tư</title>
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
                    Quy định
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
                <h4 class="m-t-0 header-title"><b>Quy định</b></h4>
                <p class="text-muted m-b-10 font-13">
                    <b>Bắt buộc</b> <code>Số bệnh nhân khám tối đa</code> <code>Tiền khám</code> <code>Mức cảnh báo hết thuốc</code>
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('quydinh.post')}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label">Số bệnh nhân khám tối đa</label>
                                    <input name="sobntoida" type="number" class="form-control" value="{{old('sobntoida',$SoBNToiDa->GiaTri)}}" placeholder="Nhập số bệnh nhân tối đa khám trong ngày..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tiền khám</label>
                                    <input name="tienkham" type="number" class="form-control" value="{{old('tienkham',$TienKham->GiaTri)}}" placeholder="Nhập tiền khám..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Mức cảnh báo thuốc</label>
                                    <input name="muccanhbaothuoc" type="number" class="form-control" value="{{old('mucanhbaothuoc',$MucCanhBaoThuoc->GiaTri)}}" placeholder="Nhập mức cảnh báo hết thuốc..." required>
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