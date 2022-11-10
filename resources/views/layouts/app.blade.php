<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('dist/img/AdminLTELogo.png')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed text-sm">
    <div class="wrapper">
        <!-- Navbar -->
        @livewire('admin.topbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Tech-Trendz</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="img-circle elevation-2" alt="User Image">
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
            <div class="sidebar-custom">
                <a href="{{route('profile.show')}}" class="btn btn-link"><i class="fas fa-cogs"></i></a>
                <button  class="btn btn-primary hide-on-collapse pos-right"><i class="fas fa-headset"></i></button>
            </div>
            <!-- Modal -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 187px">
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
            
        </div>
        <footer class="main-footer">
            <strong>Disclaimer: This is for educational purposes only made by student of <a href="https://bcp.edu.ph/">Bestlink College of the Philippines</a>.</strong> All rights reserved.
        </footer>





        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE -->
        <script src="{{asset('dist/js/adminlte.js')}}"></script>


        <script>

          $('#chat-pane-toggle').DirectChat('toggle')
            var url = window.location;
            
            // for sidebar menu entirely but not cover treeview
            $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
            }).addClass('active');
            
            // for treeview
            $('ul.nav-treeview a').filter(function() {
            return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
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
       </script>
      
        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
            data-turbolinks-eval="false" data-turbo-eval="false"></script>
        @stack('scripts')
        
</body>

</html>