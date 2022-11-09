<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Time And Attendance') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Time And Attendance">
                <thead class = "bg-info">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position </th>
                    <th>Department </th>
                    <th>Time In</th>
                    <th>Break In</th>
                    <th>Break Out</th>
                    <th>Time Out</th>
                    <th>Date</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->timein}}</td>
                            <td>{{$data->breakin}}</td>
                            <td>{{$data->breakout}}</td>
                            <td>{{$data->timeout}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->status}}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No record found</td>
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
                <label>Department</label>
                <input wire:model="department" class="form-control">
                @error('department') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Time In</label>
                <input wire:model="timein" class="form-control">
                @error('timein') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Break In</label>
                <input wire:model="timeout" class="form-control">
                @error('breakin') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Break Out</label>
                <input wire:model="timeout" class="form-control">
                @error('breakout') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Time Out</label>
                <input wire:model="timeout" class="form-control">
                @error('timeout') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>date</label>
                <input wire:model="date" class="form-control">
                @error('date') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Status</label>
                <input wire:model="status" class="form-control">
                
                @error('Status') <span class="alert text-danger">{{ $message }}<br /></span> @enderror

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
