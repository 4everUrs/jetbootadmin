<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Maintenance') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('maintenanceRequest')" class="btn btn-dark btn-sm">Request Maintenance</button>
            <x-table head="Maintenance Request">
                <thead class="bg-info">
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Subject</th>
                    <th class="text-center align-middle">Category</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Request Date</th>
                    <th class="text-center align-middle">Completion Date</th>
                    <th class="text-center align-middle">Status</th>
                </thead>
                <tbody>
                    @forelse ($requests as $key => $request)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center align-middle">{{$request->subject}}</td>
                            <td class="text-center align-middle">{{$request->category}}</td>
                            <td class="text-center align-middle">{{$request->description}}</td>
                            <td class="text-center">{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                            <td class="text-center">{{$request->completion_date}}</td>
                            <td class="text-center">{{$request->status}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="maintenanceRequest" maxWidth="lg">
        <x-slot name="title">
            {{ __('Maintenance Request Form') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group">
                <label>Type</label>
                <select wire:model="type" class="form-control">
                    <option value="">Select type</option>
                    <option value="building">Building</option>
                    <option value="equipment">Equipment</option>
                </select>
                <label>Category</label>
                <select wire:model="category" class="form-control">
                    <option value="">Select category</option>
                    <option value="repair">Repair</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="overhaul">Overhaul</option>
                </select>
                <div class="d-none" id="building">
                    <label>Building</label>
                    <select wire:model="buildingName" class="form-control">
                        <option value="">Select Building</option>
                        @foreach ($buildings as $building)
                        <option>{{$building->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-none" id="equipment">
                    <label>Equipment</label>
                    <select wire:model="equipmentName" class="form-control">
                        <option value="">Select Equipment</option>
                        @foreach ($equipments as $equipment)
                        <option>{{$equipment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="description">Description</label>
                <textarea wire:model="description" class="form-control" rows="4"></textarea>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('maintenanceRequest')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendRequest" wire:loading.attr="disabled">
                {{ __('Send Request') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
    @push('scripts')
    <script>
        window.addEventListener('show-building', event => {
                    var x = document.getElementById('building');
                    x.classList.remove('d-none');
                })
                window.addEventListener('show-equipment', event => {
                    var x = document.getElementById('equipment');
                    x.classList.remove('d-none');
                })
    </script>
    @endpush
</div>
