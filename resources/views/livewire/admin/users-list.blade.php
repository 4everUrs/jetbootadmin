<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadModal" class="btn btn-dark">Add User</button>
            <x-table head="Users List">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Position</th>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->currentTeam->name}}</td>
                            @if ($user->role_id == '0')
                                <td>Admin</td>
                            @elseif ($user->role_id == '1') 
                                <td>Manager</td>
                            @elseif ($user->role_id == '2') 
                                <td>Staff</td>
                            @endif
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="addUserModal" maxWidth="lg">
        <x-slot name="title">
            {{ __('Add User') }}
        </x-slot>
        
        <x-slot name="content">
           <div class="form-group">
            <label>Name</label>
            <input wire:model="name" type="text" class="form-control" placeholder="Full Name">
            @error('name') <span class="text-danger">{{ $message }}</span><br> @enderror
            <label>Email</label>
            <input wire:model="email" type="email" class="form-control" placeholder="Email Address">
            @error('email') <span class="text-danger">{{ $message }}</span><br> @enderror
            <label>Phone</label>
            <input wire:model="phone" type="number" class="form-control" placeholder="+63">
            @error('phone') <span class="text-danger">{{ $message }}</span><br> @enderror
            <label>Username</label>
            <input wire:model="username" type="text" class="form-control" placeholder="Username">
            @error('email') <span class="text-danger">{{ $message }}</span><br> @enderror
            <label>Password</label>
            <input wire:model="password" type="password" class="form-control" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span><br> @enderror
            <div class="row">
                <div class="col">
                    <label>User Type</label>
                    <select wire:model="role_id" class="form-control">
                        <option value="">Select Type</option>
                        <option value="1">Manager</option>
                        <option value="2">Officer</option>
                    </select>
                    @error('role_id') <span class="text-danger">{{ $message }}</span><br> @enderror
                </div>
                <div class="col">
                    <label>Department</label>
                    <select wire:model="dept" class="form-control">
                          @if (!empty($teams)){
                            @foreach ($teams as $key => $team)
                                @if ($team->name != 'Admin')
                                    <option value="{{$key+1}}">{{$team->name}}</option>
                                @endif
                            @endforeach
                          }
                              
                          @endif
                    </select>
                    @error('dept') <span class="text-danger">{{ $message }}</span><br> @enderror
                </div>
               <div class="col d-none" id="department">
                    <label>XYZ</label>
                    <select wire:model="department_id" class="form-control">
                        @if (!empty($departments)){
                            @foreach ($departments as $key => $department)
                                <option >{{$department->name}}</option>
                            @endforeach
                        }
                        @endif
                    </select>
                    @error('department_id') <span class="text-danger">{{ $message }}</span><br> @enderror
               </div>
            </div>
           </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addUserModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
           
            <x-jet-button class="ms-2" wire:click="saveUser" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
           
    
        </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')
        <script>
            window.addEventListener('showDepartment', event => {
            var x = document.getElementById('department');
            x.classList.remove('d-none');
        })
        </script>
    @endpush
</div>