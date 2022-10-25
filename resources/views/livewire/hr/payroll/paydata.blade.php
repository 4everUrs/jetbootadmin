<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Payroll') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button data-toggle="modal" data-target="#payModal" class="btn btn-success">Add Record</button>
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
   
        <div wire:ignore.self class="modal fade" id="payModal" tabindex="-1" role="dialog"
            aria-labelledby="payModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="payModalLabel">Add new Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            <label>Penstion Deduction</label>
                            <input wire:model="penstiondeduction" class="form-control">
                            @error('penstiondeduction') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Salary</label>
                            <input wire:model="salary" class="form-control">
                            @error('salary') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            
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
