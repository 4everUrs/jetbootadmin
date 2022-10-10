<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Shift And Schedule') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Shift And Schedule">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position </th>
                    <th>Department</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->department}}</td>
                            <td>{{$data->monday}}</td>
                            <td>{{$data->tuesday}}</td>
                            <td>{{$data->wednesday}}</td>
                            <td>{{$data->thursday}}</td>
                            <td>{{$data->friday}}</td>
                            <td>{{$data->saturday}}</td>
                            <td>{{$data->sunday}}</td>
                            <td>
                                <button class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No record found nigga!</td>
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
                            @error('position') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Monday</label>
                            <input wire:model="monday" class="form-control">
                            @error('monday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Tuesday</label>
                            <input wire:model="tuesday" class="form-control">
                            @error('tuesday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Wednesday</label>
                            <input wire:model="wednesday" class="form-control">
                            @error('wednesday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Thursday</label>
                            <input wire:model="thursday" class="form-control">
                            @error('thursday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Friday</label>
                            <input wire:model="friday" class="form-control">
                            @error('friday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Saturday</label>
                            <input wire:model="saturday" class="form-control">
                            @error('saturday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Sunday</label>
                            <input wire:model="sunday" class="form-control">
                            @error('sunday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
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
