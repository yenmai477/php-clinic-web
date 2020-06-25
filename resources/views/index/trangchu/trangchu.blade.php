@extends('index.layout.index')
@section('title')
<title>Trang chủ - Quản lý phòng mạch tư</title>
@endsection
@section('style')
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<style>
  .button-cus:hover h3 {
    color: #7E57C2;
  }
</style>
@endsection
@section('content')

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Trang chủ</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
          </li>

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

<!-- end page title -->

<div class="row">
  <div class="col-md-3">
    <div class="card mini-stats-wid">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <p class="text-muted font-weight-medium">Tổng số bệnh nhân đã khám trong tháng</p>
            <h4 class="mb-0 counter">{{$tongBN}}</h4>
          </div>

          <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
            <span class="avatar-title">
              <i class="bx bx-user font-size-24"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card mini-stats-wid">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <p class="text-muted font-weight-medium">Tổng phiếu khám bệnh trong tháng</p>
            <h4 class="mb-0">{{$tongPK}}</h4>
          </div>

          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
            <span class="avatar-title rounded-circle bg-primary">
              <i class="bx bxs-receipt font-size-24"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card mini-stats-wid">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <p class="text-muted font-weight-medium">
              Tổng tiền khám trong tháng
            </p>
            <h4 class="mb-0">{{number_format($tongTK)}} đ</h4>
          </div>

          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
            <span class="avatar-title rounded-circle bg-primary">
              <i class="bx bx-dollar-circle font-size-24"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card mini-stats-wid">
      <div class="card-body">
        <div class="media">
          <div class="media-body">
            <p class="text-muted font-weight-medium">
              Tổng doanh thu trong tháng
            </p>
            <h4 class="mb-0">{{number_format($tongDT)}} đ</h4>
          </div>

          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
            <span class="avatar-title rounded-circle bg-primary">
              <i class="bx bx-archive-in font-size-24"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- end r -->

<div class="card">
  <div class="card-body">
    <h4 class="card-title mb-4 font-size-16">DOANH THU 7 NGÀY GẦN NHẤT</h4>
    <div class="row">
      <div class="col-md-12" style="height: 350px">
        <canvas id="myChart"></canvas>
        {{--height="40vw" width="80vw"--}}
      </div>
    </div>
  </div>
</div>
<!-- end row -->

<div class="row">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">Top 3 thuốc có <span style="color: red">số lượng</span> sử dụng nhiều nhất</h4>
        <div class="table-responsive">
          <table class="table table-actions-bar">
            <thead>
              <tr>
                <th>Thuốc</th>
                <th style="color: red">Số lượng dùng</th>
                <th>Số lần dùng</th>
                <th>Đơn vị</th>
                {{--<th>Cách dùng</th>--}}
              </tr>
            </thead>
            <tbody>
              @foreach($TopThuocSoLuong as $value)
              <tr>
                <td>{{$value->thuoc->TenThuoc}}</td>
                <td style="color: red">{{$value->SoLuongDung}}</td>
                <td>{{$value->SoLanDung}}</td>
                <td>{{$value->thuoc->donvi->TenDonVi}}</td>
                {{--<td>Uống</td>--}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4 font-size-16">Top 3 thuốc có <span style="color: red">số lần</span> sử dụng nhiều nhất</h4>

        <div class="table-responsive">
          <table class="table table-actions-bar">
            <thead>
              <tr>
                <th>Thuốc</th>
                <th>Số lượng dùng</th>
                <th style="color: red">Số lần dùng</th>
                <th>Đơn vị</th>
                {{--<th>Cách dùng</th>--}}
              </tr>
            </thead>
            <tbody>
              @foreach($TopThuocSoLan as $thuoc)
              <tr>
                <td>{{$thuoc->thuoc->TenThuoc}}</td>
                <td>{{$thuoc->SoLuongDung}}</td>
                <td style="color: red">{{$thuoc->SoLanDung}}</td>
                <td>{{$value->thuoc->donvi->TenDonVi}}</td>
                {{--<td>Uống</td>--}}
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end row -->


@endsection
@section('script-ori')
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
  var ctx = document.getElementById('myChart').getContext('2d');
  ctx.height = 200;
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: [
        @for($i = 7; $i >= 1; $i--)
        @php
        $date = date('d/m', strtotime("-$i days"));
        @endphp

        // "{{$i}}/{{date('m')}}",
        "{{$date}}",
        @endfor
      ],
      datasets: [{
        label: "Doanh thu (VND)",
        borderColor: '#556ee6',
        data: [
          @for($i = 7; $i >= 1; $i--)
          @php
          $date = date('d', strtotime("-$i days"));
          @endphp

          "{{$doanhThu[(int)$date]}}",
          @endfor
        ],
        fill: false,
        pointBorderWidth: 5
      }]
    },

    // Configuration options go here
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: 'Biểu đồ biểu thị doanh thu 7 ngày gần nhất của phòng mạch'
      }
    }
  });
</script>


@endsection
