<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Leave Management') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button data-toggle="modal" data-target="#leaveModal" class="btn btn-success">Add Record</button>
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
          <div wire:ignore.self class="modal fade" id="leaveModal" tabindex="-1" role="dialog"
            aria-labelledby="leaveModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leaveModalLabel">Add new Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            <input wire:model="datestart" class="form-control">
                            @error('datestart') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date End</label>
                            <input wire:model="dateend" class="form-control">
                            @error('dateend') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click="saveRecord" id="leaveModal" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#leaveModal').modal('hide')
            })
        </script>
        @endpush
</div>
    