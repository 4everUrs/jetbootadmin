<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Records') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('recordModal')" class="btn btn-dark btn-sm">Add Record</button>
            <x-table head="Audit Records">
                <thead class="bg-info">
                    <th class="text-center align-middle">Audit No</th>
                    <th class="text-center align-middle">Department</th>
                    <th class="text-center align-middle">Audit Report</th>
                    <th class="text-center align-middle">Audit Officer</th>
                    <th class="text-center align-middle">Audit Date</th>
                </thead>
                <tbody>
                    @forelse ($records as $record)
                        <tr>
                            <td class="text-center align-middle">{{$record->AuditSchedule->audit_id}}</td>
                            <td class="text-center align-middle">{{$record->AuditSchedule->department}}</td>
                            <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$record->audit_file}}" target="_blank" rel="noopener noreferrer">{{$record->audit_file}}</a></td>
                            <td class="text-center align-middle">{{$record->AuditSchedule->AuditOfficer->name}}</td>
                            <td class="text-center align-middle">{{$record->AuditSchedule->date}}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="recordModal">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group">
                <label>Audit No</label>
                <select wire:model="audit_id" class="form-control">
                    <option value="">Choose...</option>
                    @foreach ($audits as $audit)
                        <option value="{{$audit->id}}">{{$audit->audit_id}}</option>
                    @endforeach
                </select>
                <label>Audit No</label>
                <input wire:model="audit_file" type="file" class="form-control">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('recordModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendRecord" wire:loading.attr="disabled">
                {{ __('Send Request') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
</div>
