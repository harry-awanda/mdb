<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; MDb</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="shortcut icon" href="{{asset('Logomark.ico')}}">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/datatables.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}"> -->
  <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/chocolat/dist/css/chocolat.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
    

    <!-- Vendor CSS Files -->
  <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
<!-- Global site tag (gtag.js) - Google Analytics -->

</head>

<body>
  <div id="app">
		@include('admin.includes._navbar')
		@include('admin.includes._sidebar')
		<!-- MAIN -->
		@yield('admincontent')
		<!-- END MAIN -->
          <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{date("Y") }} <div class="bullet"></div><a href="/">Harry Awanda</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('admin/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/popper.js')}}"></script>
  <script src="{{asset('admin/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('admin/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('admin/assets/js/theme-switch.js')}}"></script>
  <script src="{{asset('admin/assets/js/page/modules-datatables.js')}}"></script>
  <script src="{{asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
  <script src="{{asset('admin/assets/js/custom.js')}}"></script>
  
</body>
</html>