<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Payroll') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Payroll">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Pay hour</th>
                    <th>Total Hours</th>
                    <th>Overtime</th>
                    <th>Late Deduction</th>
                    <th>Penstion Deduction</th>
                    <th>Salary</th>
                    <th>View</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->payhour}}</td>
                            <td>{{$data->totalhours}}</td>
                            <td>{{$data->overtime}}</td>
                            <td>{{$data->latededuction}}</td>
                            <td>{{$data->penstiondeduction}}</td>
                            <td>{{$data->salary}}</td>
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
                            <label>Payhour</label>
                            <input wire:model="payhour" class="form-control">
                            @error('payhour') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Total Hours</label>
                            <input wire:model="totalhours" class="form-control">
                            @error('totalhours') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Overtime</label>
                            <input wire:model="overtime" class="form-control">
                            @error('overtime') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Late Deduction</label>
                            <input wire:model="latededuction" class="form-control">
                            @error('latededuction') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Pension Deduction</label>
                            <input wire:model="penstiondeduction" class="form-control">
                            @error('penstiondeduction') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Salary</label>
                            <input wire:model="salary" class="form-control">
                            @error('salary') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
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
</div>
