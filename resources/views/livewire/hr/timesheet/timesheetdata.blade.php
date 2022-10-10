<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Timesheet') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Timesheet Management">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position </th>
                    <th>Date from</th>
                    <th>Date to</th>
                    <th>Total Hours</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->datefrom}}</td>
                            <td>{{$data->dateto}}</td>
                            <td>{{$data->totalhours}}</td>
                            <td>
                                <button class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No record found nigga!</td>
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
                            <label>Position</label>
                            <input wire:model="position" class="form-control">
                            @error('position') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date From</label>
                            <input wire:model="datefrom" class="form-control">
                            @error('datefrom') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date To</label>
                            <input wire:model="dateto" class="form-control">
                            @error('dateto') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Total Hours</label>
                            <input wire:model="totalhours" class="form-control">
                            @error('totalhours') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
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
