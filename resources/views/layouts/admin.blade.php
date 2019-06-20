
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>  Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('cms\vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('cms\vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('cms\vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('cms\css/sb-admin.css') }}" rel="stylesheet">
<style>
input[type="number"] ,input[type="text"],input[type="email"]{
    width: 100%;
    border: 1px solid #9992924f;
    border-radius: 5px;
    height: 35px;
}
</style>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

     
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
 

      <!-- Navbar -->
      <div style="float:right;     right: 0px;    position: absolute;">

  </div>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active1">
          <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-home"></i>
            <span>Hotel Details</span>
          </a>
        </li>
 
        <li class="nav-item active2">
          <a class="nav-link" href="/RoomController">
            <i class="fas fa-fw  fa-flag"></i>
            <span>Room Manager</span></a>
        </li>
        <li class="nav-item active3">
          <a class="nav-link" href="/TypeController">
            <i class="fas fa-fw fa-bolt"></i>
            <span>Room Type </span></a>
        </li> 
        <li class="nav-item active4">
          <a class="nav-link" href="/CapacityController">
            <i class="fas fa-fw fa-industry"></i>
            <span>Room Capacity </span></a>
        </li> 
        <li class="nav-item active5">
          <a class="nav-link" href="/PricelistController">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Price List </span></a>
        </li> 
        <li class="nav-item active6">
          <a class="nav-link" href="/bookingController">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Booking </span></a>
        </li>
        <li class="nav-item active7">
          <a class="nav-link" href="/customermanager">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer  </span></a>
        </li> 
        <hr style=" height: 1px;width: 100%;background-color: #ffffff8c;" />
        <li class="nav-item">
        @guest
                             <a class="nav-link" href="{{ route('login') }}">Login</a> 
                        @else
                            
   
                                        <a class="nav-link"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                       <i class="fas fa-fw fa-share"></i>
                                          <span>  Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
    
                        @endguest
                        </li> 
      </ul>
 
             

        @yield('content')
 
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('cms\vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cms\vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('cms\vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('cms\vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('cms\vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('cms\vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('cms\js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('cms\js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('cms\js/demo/chart-area-demo.js') }}"></script>

  </body>

</html>

