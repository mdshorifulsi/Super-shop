<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Super Shop</title>

  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('assets/backend/css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body id="page-top">
  <div id="app">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <router-link class="navbar-brand mr-1" to="home">Super shop management System
      </router-link>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

    </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/home')}}">
           <i class="fas fa-fw fa-folder"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" to="pos">
           <i class="fas fa-fw fa-folder"></i>
          <span>point of sale (pos)</span>
        </router-link>
      </li>



      <li class="nav-item">
        <router-link class="nav-link" to="allcategory">
           <i class="fas fa-fw fa-folder"></i>
          <span>Category</span>
        </router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" to="allbrand">
           <i class="fas fa-fw fa-folder"></i>
          <span>Brand</span>
        </router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" to="allproduct">
           <i class="fas fa-fw fa-folder"></i>
          <span>Product</span>
        </router-link>
      </li>


      <li class="nav-item">
        <router-link class="nav-link" to="allstock">
           <i class="fas fa-fw fa-folder"></i>
          <span>Stock</span>
        </router-link>
      </li>




      <li class="nav-item">
        <router-link class="nav-link" to="allorder">
           <i class="fas fa-fw fa-folder"></i>
          <span>Order</span>
        </router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" to="dashboard">
           <i class="fas fa-fw fa-folder"></i>
          <span>Super Shop</span>
        </router-link>
      </li>
<br>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <button class=" btn btn-sm btn-danger">Logout</button>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>




    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="row" v-show="$route.path==='/home' ? true:false " >

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allproduct">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Product</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="pos">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Point of sale (POS)</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>



          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allstock">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Stock</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allorder">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Order</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

         </div>


        <router-view></router-view>
      </div>
    </div>
  </div>
</div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/backend/js/sb-admin.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('assets/backend/js/demo/chart-area-demo.js')}}"></script>

  <!-- alt="..." on <img> element -->
<img src="/assets/icons/bootstrap.svg" alt="Bootstrap" ...>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
