@extends('index.layout.index')
@section('title')
<title>Tra cứu bệnh nhân - Quản lý phòng mạch tư</title>
@endsection
@section('content')
<div class="row d-print-none">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Tra cứu bệnh nhân</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="javascript: void(0);">Trang chủ</a>
          </li>
          <li class="breadcrumb-item">Bệnh nhân</li>
          <li class="breadcrumb-item active">Tra cứu bệnh nhân</li>
        </ol>
      </div>
    </div>
  </div>
</div>

@if (count($errors) > 0 || session('error'))
<div class="alert alert-danger" role="alert">
  <strong>Cảnh báo!</strong><br>
  @foreach($errors->all() as $err)
  {{$err}}<br />
  @endforeach
  {{session('error')}}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
  <strong>Thành công!</strong>
  <button type="button" class="close" data-dismiss="alert">×</button>
  <br />
  {{session('success')}}
</div>
@endif
<!--end duong dan nho-->

<div class="row d-print-none">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">Tra cứu bệnh nhân</h4>
        <div class="row">
          <div class="col-md-6">
            <div class="p-l-r-10">

              <div class="form-group">
                <label class="control-label">Họ & tên bệnh nhân</label>
                <input name="hoten" type="text" class="form-control" value="{{old('hoten')}}" placeholder="Họ & tên">
              </div>


              <div class="form-group">
                <label class="control-label">Triệu chứng</label>
                <input name="trieuchung" type="text" class="form-control" value="{{old('trieuchung')}}" placeholder="Triệu chứng">
              </div>

            </div>
          </div>

          <div class="col-md-6">
            <div class="p-l-r-10">
              <div class="form-group date">
                <label>Ngày khám</label><br>

                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" placeholder="mm/dd/yyyy" data-provide="datepicker" data-date-autoclose="true" id="ngaykham" type="date" name="ngaykham">
                  <div class="input-group-append">
                    <button class="btn btn-primary" onclick="xoangay()"><i class="mdi mdi-calendar"></i></button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Chuẩn đoán loại bệnh</label>
                <select class="form-control select2" id="loaibenh" name="loaibenh">
                  <option value="">--- Chọn loại bệnh ---</option>
                  @foreach($dsLoaiBenh as $detail)
                  <option value="{{ $detail->MaLoaiBenh }}" @if (old('loaibenh')==$detail->MaLoaiBenh) selected @endif>
                    {{ $detail->TenLoaiBenh }}
                  </option>
                  @endforeach
                </select>
              </div>


            </div>
          </div>
        </div>
        <div class="row">
          <div class="offset-md-11 mt-4">
            <div class="form-group">
              <button class="btn btn-primary waves-light waves-effect" data-style="expand-right" onclick="timkiem()">Tìm kiếm
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">
          Kết quả tra cứu bệnh nhân
        </h4>
        <div class="p-10">
          <table class="table table-striped table-bordered m-0">
            <thead>
              <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Họ tên</th>
                <th class="text-center">Ngày Khám</th>
                <th class="text-center">Loại bệnh</th>
                <th class="text-center">Triệu chứng</th>
                <th class="text-center d-print-none">Hành động</th>
              </tr>
            </thead>
            <tbody style="text-align: center" id="tbodydskhambenh">
            </tbody>
          </table>
        </div>
        <div class="d-print-none">
          <div class="float-right mt-2">
            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>




  @endsection
  @section('script-ori')
  @endsection
  @section('script')
  <script>
    function del(id) {
      $.confirm({
        icon: 'fa fa-warning',
        content: "Hành động này sẽ xóa dữ liệu của phiếu khám bệnh này (bao gồm đơn thuốc và hóa đơn). Bạn có chắc muốn xóa không?",
        title: "Xác nhận xóa",
        type: 'red',
        typeAnimated: true,
        buttons: {
          confirmButton: {
            text: "Có hãy xóa",
            btnClass: "btn-danger",
            action: function(button) {
              window.location.assign("phieukham/xoa/" + id);
            },
          },
          cancelButton: {
            text: "Không, đừng xóa",
            btnClass: "btn-default",
            action: function(button) {
              console.log("cancel!");

            }
          },
        },
        post: false,
        submitForm: false,
        theme: "bootstrap"

      });
    }
  </script>
  <script>
    function xoangay() {
      $("#ngaykham").val("");
    }

    function timkiem() {
      var hoten = $("input[name='hoten']").val();
      var ngay = $("input[name='ngaykham']").val() || "";
      var trieuchung = $("input[name='trieuchung']").val();
      var loaibenh = $('select[name=loaibenh]').val();
      var token = $("input[name='_token']").val();
      // alert(ngay.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2"));
      if (hoten == "" && trieuchung == "" && loaibenh == "" && ngay == "") {
        alert("Bạn chưa nhập từ khóa cần tìm.");
      } else {
        $.ajax({
          url: "{{route('ajax-tracuu-benhnhan.get')}}",
          type: "GET",
          async: true,
          data: {
            //                        "_token": token,
            "hoten": hoten,
            // "ngay": ngay.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$2-$1"),
            "ngay": ngay.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2"),
            "trieuchung": trieuchung,
            "loaibenh": loaibenh
          },
          beforeSend: function() {
            $("#tbodydskhambenh").html("<tr><td colspan='6'><div class=" +
              "\'spinner-border text-primary\'" + " role=" + "status>" +
              "<span class =" + "sr-only > Loading... < /span> </div></td > < /tr>");
          },
          success: function(data) {
            $("#tbodydskhambenh").html(data);
            // alert(data);
          }
        });
      }
    }
  </script>


  @endsection
