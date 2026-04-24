<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forum Diskusi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('template/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('template/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('template/vendors/ti-icons/css/themify-icons.css')}}">
    <!-- End plugin css for this page -->  
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('template/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('template/images/Icon_forum.png')}}">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('headers')
</head>
<body>
@include('sweetalert::alert')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.partial.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('layouts.partial.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
      </div>
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright {{date("Y")}}.  Kelompok 15:
            <a href="https://gitlab.com/iruelhidayat" target="_blank">Nurul Hidayat, </a>
            <a href="https://gitlab.com/yogaaof" target="_blank">Muhamad Yoga Subarkah, </a>
            <a href="https://gitlab.com/ragiljohan" target="_blank">Ragil Andika Johan.</a>
            All rights reserved.</span>
        </div>
      </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('template/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('template/js/off-canvas.js')}}"></script>
  <script src="{{asset('template/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('template/js/template.js')}}"></script>
  <script src="{{asset('template/js/settings.js')}}"></script>
  <!-- endinject -->
  @stack('scripts')
</body>

</html>

