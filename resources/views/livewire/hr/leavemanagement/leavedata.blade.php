<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Leave Management') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Leave Management">
                <thead class = "bg-info">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Position </th>
                    <th>Reason</th>
                    <th>Date Start</th>
                    <th>Date end</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
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
                                <button wire:click = "approveModal({{$data->id}})" class="btn btn-primary">Approve</button>
                                <button wire:click = "disapproveModal({{$data->id}})"class="btn btn-secondary">Disapprove</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
        </div><select wire:model="type" class="form-control">
                                <option></option>
                                <option>Vacational Leave</option>
                                <option>Sick Leave</option>
                                <option>Maternity Leave</option>
                                <option>Parental Leave</option>
                            </select>
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
                            <label>Type</label>
                            
                            @error('type') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Position</label>
                            <input wire:model="position" class="form-control">
                            @error('position') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Reason</label>
                            <input wire:model="reason" class="form-control">
                            @error('reason') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date Start</label>
                            <input type="date" wire:model="datestart" class="form-control">
                            @error('datestart') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Date End</label>
                            <input type="date" wire:model="dateend" class="form-control">
                            @error('dateend') <span class="alert text-danger">{{ $message }}<br /></span> @enderror

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

            <x-jet-dialog-modal wire:model="modalApprove">
                <x-slot name="title">
                    {{ __('Are You Sure To Approve Request') }}  
                </x-slot>
                <x-slot name="content">
                <h2>Confirm</h2>         
                            </x-slot> 
                                <x-slot name="footer">
                                    <x-jet-secondary-button wire:click="$toggle('modalApprove')" wire:loading.attr="disabled">
                                        {{ __('Cancel') }}
                                    </x-jet-secondary-button>
                                    <x-jet-button class="ms-2" wire:click="confirm" wire:loading.attr="disabled">
                                        {{ __('Confirm') }}
                                    </x-jet-button>
                                </x-slot>
                    </x-jet-dialog-modal>
                    <x-jet-dialog-modal wire:model="modalDisapprove">
                        <x-slot name="title">
                            {{ __('Are You Sure To Disapprove Request') }}  
                        </x-slot>
                        <x-slot name="content">
                         <h2>Confirm</h2>
                                        
                                    </x-slot> 
                                        <x-slot name="footer">
                                            <x-jet-secondary-button wire:click="$toggle('modalDisapprove')" wire:loading.attr="disabled">
                                                {{ __('Cancel') }}
                                            </x-jet-secondary-button>
                                            <x-jet-button class="ms-2" wire:click="disconfirm" wire:loading.attr="disabled">
                                                {{ __('confirm') }}
                                            </x-jet-button>
                                        </x-slot>
                            </x-jet-dialog-modal>
</div>
    