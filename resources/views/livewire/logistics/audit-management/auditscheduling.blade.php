<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Scheduling') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('createSchedule')" class="btn btn-dark btn-sm">Create Schedule</button>
            <x-table head="Schedule Lists">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Department</th>
                    <th class="text-center align-middle">Auditing Officer</th>
                    <th class="text-center align-middle">Auditing Date </th>
                    <th class="text-center align-middle">Status</th>
                </thead>   
                <tbody>
                    @forelse ($schedules as $sched)
                        <tr>
                            <td class="text-center align-middle">{{$sched->id}}</td>
                            <td class="text-center align-middle">{{$sched->department}}</td>
                            <td class="text-center align-middle">{{$sched->AuditOfficer->name}}</td>
                            <td class="text-center align-middle">{{$sched->date}}</td>
                            <td class="text-center align-middle">{{$sched->status}}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody> 
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="createSchedule">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group">
                <label>Audit Officer</label>
                <select wire:model="officer_id" class="form-control">
                    <option value="">Choose..</option>
                    @foreach ($officers as $officer)
                        <option value="{{$officer->id}}">{{$officer->name}}</option>
                    @endforeach
                </select>
                <label>Department</label>
                <select wire:model="department" class="form-control">
                    <option value="">Choose..</option>
                    <option value="Warehouse">Warehouse</option>
                    <option value="Asset Management">Asset Management</option>
                    <option value="Finance">Finance</option>
                </select>
                <label>Date</label>
                <input wire:model="date"  class="form-control" type="date">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('createSchedule')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>    
</div>
