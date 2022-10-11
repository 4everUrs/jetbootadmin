<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Leave Management') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Leave Management">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Position </th>
                    <th>Reason</th>
                    <th>Date Start</th>
                    <th>Date end</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->type}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->reason}}</td>
                            <td>{{$data->datestart}}</td>
                            <td>{{$data->datestart}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <button class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No record found nigga!</td>
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
                            <label>Type</label>
                            <select wire:model="type" class="form-control">
                                <option></option>
                                <option>Vacational Leave</option>
                                <option>Sick Leave</option>
                                <option>Maternity Leave</option>
                                <option>Parental Leave</option>
                            </select>
                            @error('type') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Position</label>
                            <input wire:model="position" class="form-control">
                            @error('position') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Reason</label>
                            <input wire:model="reason" class="form-control">
                            @error('reason') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date Start</label>
                            <input type = "date" wire:model="datestart" class="form-control">
                            <label>Date End</label>
                            <input type = "date" wire:model="dateend" class="form-control">
                            
                            
                        
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
    