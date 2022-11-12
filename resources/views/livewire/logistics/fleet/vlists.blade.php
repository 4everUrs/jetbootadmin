<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
            <li class="nav-item mr-2 " role="presentation" wire:ignore>
                <button class="nav-link active" id="Available-tab" data-bs-toggle="tab" data-bs-target="#Available" type="button"
                    role="tab" aria-controls="Available" aria-selected="true">Available</button>
            </li>
            <li class="nav-item mr-2" role="presentation" wire:ignore>
                <button class="nav-link" id="Reserved-tab" data-bs-toggle="tab" data-bs-target="#Reserved" type="button"
                    role="tab" aria-controls="Reserved" aria-selected="false">Reserved</button>
            </li>
            <li class="nav-item" role="presentation" wire:ignore>
                <button class="nav-link" id="Repairing-tab" data-bs-toggle="tab" data-bs-target="#Repairing" type="button"
                    role="tab" aria-controls="Repairing" aria-selected="false">Repairing</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div wire:ignore.self class="tab-pane fade show active" id="Available" role="tabpanel" aria-labelledby="Available-tab">
                <div class="card">
                    <div class="card-body">
                       <x-table head="Available Vehicle">
                            <thead class="bg-info">
                                <th class="text-center align-middle">Assigned Driver</th>
                                <th class="text-center align-middle">Vehicle Type</th>
                                <th class="text-center align-middle">Vechicle Brand</th>
                                <th class="text-center align-middle">Vechile Model</th>
                                <th class="text-center align-middle">Vechicle Plate No</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($available as $vehicle)
                                <tr>
                                    <td class="text-center align-middle">{{$vehicle->driver_name}}</td>
                                    <td class="text-center align-middle">{{$vehicle->type}}</td>
                                    <td class="text-center align-middle">{{$vehicle->brand}}</td>
                                    <td class="text-center align-middle">{{$vehicle->model}}</td>
                                    <td class="text-center align-middle">{{$vehicle->plate}}</td>
                                    <td class="text-center">{{$vehicle->status}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-6 d-none" id="status" wire:ignore>
                                                <select wire:model="status" class="form-control form-control-sm ">
                                                    <option value="-">Select an option</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Repairing">Repairing</option>
                                                </select>
                                            </div>
                                            <div class="col" id="changeStatus"wire:ignore>
                                                <button onclick="showSelect()" class="btn btn-sm btn-primary">Change Status</button>
                                            </div>
                                            <div class="col d-none" id="process" wire:ignore>
                                                <button onclick="changedStatus()" wire:click='changeStatus({{$vehicle->id}})' class="btn btn-success btn-sm"><i class='fa fa-check'></i></button>
                                                <button class="btn btn-danger btn-sm"><i class='fa fa-times'></i></button>
                                            </div>
                                        </div>
                                        
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="tab-pane fade" id="Reserved" role="tabpanel" aria-labelledby="Reserved-tab">
                <div class="card">
                    <div class="card-body">
                        <x-table head="Reserved Vehicle">
                            <thead class="bg-info">
                                <th class="text-center align-middle">Assigned Driver</th>
                                <th class="text-center align-middle">Vehicle Type</th>
                                <th class="text-center align-middle">Vechicle Brand</th>
                                <th class="text-center align-middle">Vechile Model</th>
                                <th class="text-center align-middle">Vechicle Plate No</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($reserved as $vehicle)
                                <tr>
                                    <td class="text-center align-middle">{{$vehicle->driver_name}}</td>
                                    <td class="text-center align-middle">{{$vehicle->type}}</td>
                                    <td class="text-center align-middle">{{$vehicle->brand}}</td>
                                    <td class="text-center align-middle">{{$vehicle->model}}</td>
                                    <td class="text-center align-middle">{{$vehicle->plate}}</td>
                                    <td class="text-center">{{$vehicle->status}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-6 d-none" id="status" wire:ignore>
                                                <select wire:model="status" class="form-control form-control-sm ">
                                                    <option value="-">Select an option</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Repairing">Repairing</option>
                                                </select>
                                            </div>
                                            <div class="col" id="changeStatus" wire:ignore>
                                                <button onclick="showSelect()" class="btn btn-sm btn-primary">Change Status</button>
                                            </div>
                                            <div class="col d-none" id="process" wire:ignore>
                                                <button onclick="changedStatus()" wire:click='changeStatus({{$vehicle->id}})'
                                                    class="btn btn-success btn-sm"><i class='fa fa-check'></i></button>
                                                <button class="btn btn-danger btn-sm"><i class='fa fa-times'></i></button>
                                            </div>
                                        </div>
                        
                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="tab-pane fade" id="Repairing" role="tabpanel" aria-labelledby="Repairing-tab">
                <div class="card">
                    <div class="card-body">
                        <x-table head="Maintenanced Vehicle">
                            <thead class="bg-info">
                                <th class="text-center align-middle">Assigned Driver</th>
                                <th class="text-center align-middle">Vehicle Type</th>
                                <th class="text-center align-middle">Vechicle Brand</th>
                                <th class="text-center align-middle">Vechile Model</th>
                                <th class="text-center align-middle">Vechicle Plate No</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($repairing as $vehicle)
                                <tr>
                                    <td class="text-center align-middle">{{$vehicle->driver_name}}</td>
                                    <td class="text-center align-middle">{{$vehicle->type}}</td>
                                    <td class="text-center align-middle">{{$vehicle->brand}}</td>
                                    <td class="text-center align-middle">{{$vehicle->model}}</td>
                                    <td class="text-center align-middle">{{$vehicle->plate}}</td>
                                    <td class="text-center">{{$vehicle->status}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-6 d-none" id="status" wire:ignore>
                                                <select wire:model="status" class="form-control form-control-sm ">
                                                    <option value="-">Select an option</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Repairing">Repairing</option>
                                                </select>
                                            </div>
                                            <div class="col" id="changeStatus" wire:ignore>
                                                <button onclick="showSelect()" class="btn btn-sm btn-primary">Change Status</button>
                                            </div>
                                            <div class="col d-none" id="process" wire:ignore>
                                                <button onclick="changedStatus()" wire:click='changeStatus({{$vehicle->id}})'
                                                    class="btn btn-success btn-sm"><i class='fa fa-check'></i></button>
                                                <button class="btn btn-danger btn-sm"><i class='fa fa-times'></i></button>
                                            </div>
                                        </div>
                        
                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    @push('scripts')
        <script>
           function showSelect() {
            document.getElementById("status").classList.remove('d-none');
            document.getElementById("changeStatus").classList.add('d-none');
            document.getElementById("process").classList.remove('d-none');
            }
           function changedStatus() {
            document.getElementById("status").classList.add('d-none');
            document.getElementById("changeStatus").classList.remove('d-none');
            document.getElementById("process").classList.add('d-none');
            }
        </script>
    @endpush
</div>
