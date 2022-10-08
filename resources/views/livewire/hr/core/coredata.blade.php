<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Core Human Capital') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button data-toggle="modal" data-target="#CoreModal" class="btn btn-success">Add Record</button>
            <x-table head="Core Human Capital">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Work Experience</th>
                    <th>Skills</th>
                    <th>Qualification</th>
                    <th>Education Background</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->work}}</td>
                            <td>{{$data->skill}}</td>
                            <td>{{$data->qualification}}</td>
                            <td>{{$data->education}}</td>
                            <td>{{$data->paidby}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <button class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No record found nigga!</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
        </div>
    </div>
   
        <div wire:ignore.self class="modal fade" id="CoreModal" tabindex="-1" role="dialog"
            aria-labelledby="CoreModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CoreModalLabel">Add new Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input wire:model="name" class="form-control">
                            @error('name') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Work Experience</label>
                            <input wire:model="work" class="form-control">
                            @error('work') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Skills</label>
                            <input wire:model="skill" class="form-control">
                            @error('skill') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Qualification</label>
                            <input wire:model="qualification" class="form-control">
                            @error('qualification') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Educational Background</label>
                            <input wire:model="education" class="form-control">
                            @error('education') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Status</label>
                            <input wire:model="status" class="form-control">
                            @error('status') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            
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
