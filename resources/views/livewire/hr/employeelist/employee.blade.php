<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Employee Record') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Employees">
                <thead class = "bg-info">
                    <th>Employee Id</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Department</th>
                    <th>Position </th>
                    <th>Location</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Type Of Employement</th>
                    <th>Date Hired</th>
                    <th>End Of Contract</th>

                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->company}}</td>
                            <td>{{$data->department}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->mobile}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->datehire}}</td>
                            <td>{{$data->endo}}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
        </div>
    </div>
    <x-jet-dialog-modal wire:model="addRecord">
        <x-slot name="title">
            {{ __('Add new Record') }}
        </x-slot>
        <x-slot name="content">
                        <div class="form-group">
                             <label>Name</label>
                            <input wire:model="name" class="form-control">
                            @error('name') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Company</label>
                            <input wire:model="company" class="form-control">
                            @error('company') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Department</label>
                            <input wire:model="department" class="form-control">
                            @error('department') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Position</label>
                            <input wire:model="position" class="form-control">
                            @error('position') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                           <label>Location</label>
                            <input wire:model="address" class="form-control">
                            @error('address') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Gender</label>
                            <input wire:model="gender" class="form-control">
                            @error('gender') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Mobile</label>
                            <input wire:model="mobile" class="form-control">
                            @error('mobile') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Type Of Employees</label>
                            <select wire:model="email" class="form-control">
                                <option></option>
                                <option>Regular Employees</option>
                                <option>Seasonal Employees</option>
                                <option>Probitionary Employees</option>
                                <option>Casual Employees</option>
                                <option>Reliver Employees</option>
                            </select>
                            @error('email') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date hired</label>
                            <input type = "date" wire:model="datehire" class="form-control">
                            @error('datehire') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>End Of Contract</label>
                            <input type = "date" wire:model="endo" class="form-control">
                            @error('endo') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                           
                        </div>
                    </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('addRecord')" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-jet-secondary-button>
                            <x-jet-button class="ms-2" wire:click="saveData" wire:loading.attr="disabled">
                                {{ __('Add new Record') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-dialog-modal>         
</div>

