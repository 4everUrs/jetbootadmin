<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('addUserModal')" class="btn btn-dark btn-sm">+ Add Officer</button>
           <x-table head="Officers List">
                <thead class="bg-info">
                    <th class="text-center align-middle">ID</th>
                    <th class="text-center align-middle">Name</th>
                    <th class="text-center align-middle">Email</th>
                    <th class="text-center align-middle">Department</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center align-middle">{{$user->id}}</td>
                            <td class="text-center align-middle">{{$user->name}}</td>
                            <td class="text-center align-middle">{{$user->email}}</td>
                            <td class="text-center align-middle">{{$user->currentTeam->name}}</td>
                            <td class="text-center align-middle">{{$user->status}}</td>
                            <td class="text-center align-middle">
                                <button class="btn btn-warning btn-sm">HOLD</button>
                                <button class="btn btn-danger btn-sm">TERMINATE</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="addUserModal">
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
                <label>Department</label>
                <select wire:model="department_id" class="form-control">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
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
</div>
