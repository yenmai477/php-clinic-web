<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
          <span class="logo-sm">
            <img src="assets/images/logo.svg" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="17">
          </span>
        </a>

        <a href="/" class="logo logo-light">
          <span class="logo-sm">
            <img src="assets/images/logo-light.svg" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="assets/images/logo-light.png" alt="" height="19">
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button>
      <button type="button" class="btn btn-sm px-3 font-size-14 header-item waves-effect">
        <span class="d-none d-xl-inline-block ml-1">Số bệnh nhân có thể khám còn lại là:
          <strong style="margin-left: 3px; font-size: 1.25em">{{ $SoBNConLai}}</strong></span>
      </button>
    </div>

    <div class="d-flex">


      <div class="dropdown d-none d-lg-inline-block ml-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
          <i class="bx bx-fullscreen"></i>
        </button>
      </div>

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="bx bx-bell bx-tada"></i>
          @if(count($CanhBaoThuoc) > 0)
          <span class="badge badge-danger badge-pill">{{count($CanhBaoThuoc)}}</span>
          @endif
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown" style="">
          <div class="p-3">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="m-0"> Cảnh báo hết thuốc </h6>
              </div>
              <!-- <div class="col-auto">
                <a href="#!" class="small"> View All</a>
              </div> -->
            </div>
          </div>
          <div data-simplebar="init" style="max-height: 230px;">
            <div class="simplebar-wrapper" style="margin: 0px;">
              <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
              </div>
              <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                  <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                    <div class="simplebar-content" style="padding: 0px;">

                      @if(count($CanhBaoThuoc) > 0)
                      @foreach($CanhBaoThuoc as $detail) <span href="" class="text-reset notification-item">
                        <div class="media">
                          <div class="avatar-xs mr-3">
                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                              <i class="bx bx-band-aid"></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="mt-0 mb-1">Thuốc {{$detail->TenThuoc}}</h6>
                            <div class="font-size-12 text-muted">
                              <p class="mb-1">Số lượng còn lại:
                                <span class="text-custom font-600"> {{$detail->SoLuongConLai}} {{$detail->donvi->TenDonVi}}</p>
                              <!-- <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p> -->
                            </div>
                          </div>
                        </div>
                        </a>
                        @endforeach
                        @else
                        <a href="" class="text-reset notification-item">
                          <div class="media">
                            <div class="avatar-xs mr-3">
                              <span class="avatar-title bg-primary rounded-circle font-size-16">
                                <i class="bx bx-band-aid"></i>
                              </span>
                            </div>
                            <div class="media-body">
                              <h6 class="mt-0 mb-1">Không có cảnh báo thuốc</h6>
                              <div class="font-size-12 text-muted">
                                <p class="mb-1">Chúng tôi sẽ thông báo cho bạn khi có cảnh báo mới</p>
                                <!-- <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p> -->
                              </div>
                            </div>
                          </div>
                        </a>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
              <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
              <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none; height: 137px;"></div>
            </div>
          </div>
          <div class="p-2 border-top">
            <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
              <i class="mdi mdi-arrow-right-circle mr-1"></i> Đóng
            </a>
          </div>
        </div>
      </div>


      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
          @if (Auth::check())
          <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
          @endif
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <!-- item-->
          <a class="dropdown-item" href="{{route('hoso.get')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Hồ sơ</a>
          <a class="dropdown-item" href="{{route('doimatkhau.get')}}"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i>Đổi mật khẩu</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="{{route('dangxuat.get')}}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Đăng xuất</a>
        </div>
      </div>

    </div>
  </div>
</header>
