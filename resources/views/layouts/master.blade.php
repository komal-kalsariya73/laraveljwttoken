


<!DOCTYPE html>
<html lang="en">

<head>
<title>Admin Portal</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.header')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <!-- <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div> -->
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('layouts.navbar')
            </div>
                @yield('content')
                <!-- End Navbar -->
                @include('layouts.footer')
            </div>
          
  </div>
         
            <!-- footetr -->
        
            <!-- end footer -->
      

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
   
   
    <!--   Core JS Files   -->
    @include('layouts.jsscript')
</body>

</html>