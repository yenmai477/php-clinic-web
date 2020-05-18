<div class="vertical-menu">
  <div data-simplebar="init" class="h-100">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Ứng dụng</li>

        <li>
          <a href="" class="waves-effect">
            <i class="bx bx-home-circle"></i>

            <span>Trang chủ</span>
          </a>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-user"></i>
            <span>Quản lý bệnh nhân</span>
          </a>
          <ul class="sub-menu mm-collapse" aria-expanded="false">
            <li><a href="{{route('ds-benhnhan.get')}}"> Danh sách bệnh nhân </a></li>
            <li><a href="{{route('them-benhnhan.get')}}"> Thêm bệnh nhân </a></li>
            <li><a href="{{route('tracuu-benhnhan.get')}}"> Tra cứu bệnh nhân </a></li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-copy-alt"></i>
            <span>Quản lý phiếu khám</span>
          </a>
          <ul class="sub-menu mm-collapse" aria-expanded="false">
            <li><a href="{{route('ds-phieukham.get')}}"> Danh sách phiếu khám </a></li>
            <li><a href="{{route('them-phieukham.get')}}"> Thêm phiếu khám </a></li>
            <li><a href="{{route('ds-khambenh.get')}}"> Danh sách khám bệnh </a></li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bxs-report"></i>
            <span>Báo cáo</span>
          </a>
          <ul class="sub-menu mm-collapse" aria-expanded="false">
            <li><a href="{{route('cronjobthem-bcdt.get')}}"> Lập báo cáo doanh thu </a></li>
            <li><a href="{{route('bcdt.get')}}"> Báo cáo doanh thu </a></li>
            <li><a href="{{route('bcsdt.get')}}"> Báo cáo sử dụng thuốc </a></li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-list-ul"></i>
            <span>Danh mục</span>
          </a>
          <ul class="sub-menu mm-collapse" aria-expanded="false">
            <li><a href="{{route('ds-loaibenh.get')}}"> Quản lý loại bệnh </a></li>
            <li><a href="{{route('ds-thuoc.get')}}"> Quản lý thuốc </a></li>
            <li><a href="{{route('ds-donvi.get')}}"> Quản lý đơn vị </a></li>
            <li><a href="{{route('ds-cachdung.get')}}"> Quản lý cách dùng </a></li>
            <li><a href="{{route('ds-pnt.get')}}"> Nhập thuốc </a></li>
          </ul>
        </li>

        <li>
          <a href="{{route('quydinh.get')}}" class="waves-effect">
            <i class="bx bx-cog"></i>
            <span>Quy định</span>
          </a>
        </li>

        <li>
          <a href="{{route('dangxuat.get')}}" class="waves-effect">
            <i class="bx bx-power-off"></i>
            <span>Đăng xuất</span>
          </a>
        </li>

        <li class="menu-title">Tác giả</li>

        <li>
          <a href="{{route('aboutus.get')}}" class="waves-effect">
            <i class="bx bx-id-card"></i>
            <span>Về chúng tôi</span>
          </a>

        </li>



    </div>
    <!-- Sidebar -->
  </div>
</div>
