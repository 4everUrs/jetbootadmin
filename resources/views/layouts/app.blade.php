<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    
    @livewireStyles
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
   <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.topbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
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
    
    </div>

   
    
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    
    @stack('modals')
    
    @livewireScripts
    
    @stack('scripts')
    <script>
        var url = window.location;
            
            // for sidebar menu entirely but not cover treeview
            $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
            }).addClass('active');
            
            // for treeview
            $('ul.nav-treeview a').filter(function() {
            return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    </script>
</body>

</html>