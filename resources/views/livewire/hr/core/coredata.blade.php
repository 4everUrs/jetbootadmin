<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Core Human Capital') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal"  class="btn btn-success">Add Record</button>
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
                            <td>{{$data->status}}</td>
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
    <x-jet-dialog-modal wire:model="addRecord">
        <x-slot name="title">
            {{ __('Add new Record') }}
        </x-slot>
        <x-slot name="content">
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
