<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Compensation Planning') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button data-toggle="modal" data-target="#compensationModal" class="btn btn-success">Add Record</button>
            <x-table head="Compensation Planning">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Base Pay</th>
                    <th>Benefits</th>
                    <th>Insentives</th>
                    <th>Insurance</th>
                    <th>View</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->basepay}}</td>
                            <td>{{$data->benefits}}</td>
                            <td>{{$data->insentives}}</td>
                            <td>{{$data->insurance}}</td>
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
   
        <div wire:ignore.self class="modal fade" id="compensationModal" tabindex="-1" role="dialog"
            aria-labelledby="compensationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="compensationModalLabel">Add new Record</h5>
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
                            <label>Basepay</label>
                            <input wire:model="basepay" class="form-control">
                            @error('basepay') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Benefits</label>
                            <input wire:model="benefits" class="form-control">
                            @error('benefits') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Insentives</label>
                            <input wire:model="insentives" class="form-control">
                            @error('insentives') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Insurance</label>
                            <input wire:model="insurance" class="form-control">
                            @error('insurance') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            
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
