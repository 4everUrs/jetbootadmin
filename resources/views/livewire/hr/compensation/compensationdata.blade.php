<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Compensation Planning') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
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
