<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" id="boody">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.topbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Tech-Trendz</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('profile.show')}}" class="d-block">{{ Auth::user()->name }}</a>
                        
                    </div>
                </div>
                @if (Auth::user()->current_team_id == '1')
                @livewire('admin.sidebar')
                @elseif (Auth::user()->current_team_id == '2')
                @livewire('logistics.sidebar')
                @elseif (Auth::user()->current_team_id == '3')
                @livewire('finance.sidebar')
                @elseif (Auth::user()->current_team_id == '4')
                @livewire('core.sidebar')
                @elseif (Auth::user()->current_team_id == '5')
                @livewire('hr.sidebar')
                @elseif (Auth::user()->current_team_id == '6')
                @livewire('logistics.sidebars.procurement')
                @elseif (Auth::user()->current_team_id == '7')
                @livewire('logistics.sidebars.asset')
                @elseif (Auth::user()->current_team_id == '8')
                @livewire('logistics.sidebars.projectmanagement')
                @elseif (Auth::user()->current_team_id == '9')
                @livewire('logistics.sidebars.fleet')
                @elseif (Auth::user()->current_team_id == '10')
                @livewire('logistics.sidebars.vendor')
                @elseif (Auth::user()->current_team_id == '11')
                @livewire('logistics.sidebars.mro')
                @elseif (Auth::user()->current_team_id == '12')
                @livewire('logistics.sidebars.vehicle-reservation')
                @elseif (Auth::user()->current_team_id == '13')
                @livewire('logistics.sidebars.audit')
                @elseif (Auth::user()->current_team_id == '14')
                @livewire('logistics.sidebars.warehouse')
                @endif
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $header }}</h1>
                        </div><!-- /.col -->
                       
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            
            <div class="content">
                <div class="container-fluid">
                    {{$slot}}
                </div>
            </div>
           
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Disclamer: This is for educational purposes only. Provided by the student of <a href="https://bcp.edu.ph/">Bestlink College of the Philippines</a></strong>
           
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @stack('modals')
    
    @livewireScripts
    
    @stack('scripts')
    <script>
        window.addEventListener('showButton', event => {
        var element = document.getElementById("createButton");
        var review = document.getElementById("reviewButton");
        element.classList.remove("d-none");
        review.classList.add("d-none");
        })
        window.addEventListener('vendor-form', event => {
        var vendor = document.getElementById('vendor');
        var content = document.getElementById('content');
        content.classList.add('d-none');
        vendor.classList.remove('d-none');
        })
       /** add active class and stay opened when selected */
        var url = window.location;
        const allLinks = document.querySelectorAll('.nav-item a');
        const currentLink = [...allLinks].filter(e => {
        return e.href == url;
        });
        
        if (currentLink.length > 0) { //this filter because some links are not from menu
        currentLink[0].classList.add("active");
        currentLink[0].closest(".nav-treeview").style.display = "block";
        currentLink[0].closest(".nav-treeview").classList.add("active");
        }
        
        function darkmode() {
            var body = document.getElementById("boody");
            var topbar = document.getElementById('topbar');
            var moon = document.getElementById('dark');
            var sun = document.getElementById('light');
            sun.classList.remove('d-none');
            moon.classList.add('d-none');
            body.classList.add("dark-mode");
            topbar.classList.add('bg-dark');
        }
        function light() {
            var body = document.getElementById("boody");
            var topbar = document.getElementById('topbar');
            var moon = document.getElementById('dark');
            var sun = document.getElementById('light');
            sun.classList.add('d-none');
            moon.classList.remove('d-none');
            body.classList.remove("dark-mode");
            topbar.classList.remove('bg-dark');
        }
    </script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script> --}}

    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

    {{-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>  --}}
</body>

</html>