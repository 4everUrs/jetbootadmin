<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Time And Attendance') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button data-toggle="modal" data-target="#timeModal" class="btn btn-success">Add Record</button>
            <x-table head="Time And Attendance">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position </th>
                    <th>Department </th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>View</th>   
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->timein}}</td>
                            <td>{{$data->timeout}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->status}}</td>
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
   
        <div wire:ignore.self class="modal fade" id="timeModal" tabindex="-1" role="dialog"
            aria-labelledby="timeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="timeModalLabel">Add new Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click="saveRecord" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
</div>
