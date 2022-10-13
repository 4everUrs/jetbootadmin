<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed" id="topbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <x-jet-dropdown id="teamManagementDropdown">
            <x-slot name="trigger">
                {{__('Attendance')}}
                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </x-slot>
        
            <x-slot name="content">
               <x-jet-dropdown-link href="{{route('timein')}}">
                {{ __('Time-in') }}
                
            </x-jet-dropdown-link>
               <x-jet-dropdown-link href="#">
                {{ __('Time-out') }}
            </x-jet-dropdown-link>
               <x-jet-dropdown-link href="#">
                {{ __('Break-in') }}
            </x-jet-dropdown-link>
               <x-jet-dropdown-link href="#">
                {{ __('Break-out') }}
            </x-jet-dropdown-link>
            </x-slot>
        </x-jet-dropdown>
        
       
        <!-- Navbar Search -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            @if (Auth::user()->role_id == '0')
                <x-jet-dropdown id="teamManagementDropdown">
                    <x-slot name="trigger">
                        {{ Auth::user()->currentTeam->name }}
                
                        <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </x-slot>
                
                    <x-slot name="content">
                        <!-- Team Management -->
                        <h6 class="dropdown-header">
                            {{ __('Manage Team') }}
                        </h6>
                
                        <!-- Team Settings -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-jet-dropdown-link>
                
                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                            {{ __('Create New Team') }}
                        </x-jet-dropdown-link>
                        @endcan
                
                        <hr class="dropdown-divider">
                
                        <!-- Team Switcher -->
                        <h6 class="dropdown-header">
                            {{ __('Switch Teams') }}
                        </h6>
                
                        @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" />
                        @endforeach
                    </x-slot>
                </x-jet-dropdown>
            @endif
        @endif
        

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">No new Message</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                
            </a>
        </li>
        
    </ul>
</nav>