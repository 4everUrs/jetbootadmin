<div>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Audit Trail</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Achive</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('users')}}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Users List</p>
            </a>
        </li>
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
    </ul>
</nav>
</div>
