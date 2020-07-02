<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  @yield('title')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- App favicon -->
  <base href="{{asset('')}}">
  <link rel="shortcut icon" href="assets/images/favicon.ico">


  <!-- <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
  <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/libs/jquery/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">

  <!-- DataTables -->
  <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- Responsive datatable  -->
  <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

  <!-- App Css-->
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body data-topbar="dark">

  <!-- Begin page -->
  <div id="layout-wrapper">

    <!-- Top Bar Start -->
    @include('index.layout.header')
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('index.layout.menu')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">
          @yield('content')

        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->


      <!-- footer -->
      @include('index.layout.footer')
      <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- JAVASCRIPT -->
    <base href="{{asset('')}}">
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/jquery/jquery-confirm.js"></script>

    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <!-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> -->

    <!-- <script src="assets/js/pages/dashboard.init.js"></script> -->


    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


    <script src="assets/libs/select2/js/select2.min.js"></script>
    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- toastr plugin -->
    <script src="assets/libs/toastr/build/toastr.min.js"></script>

    <!-- toastr init -->
    <script src="assets/js/pages/toastr.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>


    <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


    @yield('script')
</body>

</html>
