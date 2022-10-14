<div>
   <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Create New Asset') }}
        </h2>
   </x-slot>
   <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <table>
                    <tr>
                        <td>Select Type</td>
                        <td>
                            <select wire:model="type" class="form-control">
                                <option value="">Select Option</option>
                                <option value="building">Building</option>
                                <option value="vehicle">Vehicle</option>
                                <option value="equipment">Equipments</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card mt-3 d-none" id="building">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Building Name</td>
                        <td>
                            <input wire:model='name' type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Building Location</td>
                        <td>
                            <input wire:model='location' type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Building Date</td>
                        <td>
                            <div x-data x-init="new Pikaday({ field: $refs.dateInput, format: 'D/M/YYYY' })">
                                <input x-ref="dateInput" type="text" wire:model.lazy="date" class="form-control" autocomplete="off">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Building Contractor</td>
                        <td>
                            <input wire:model='contractor' type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Building Cost</td>
                        <td>
                            <input wire:model='cost' type="number" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Building Specs</td>
                        <td>
                            <textarea wire:model='specs' class="form-control" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">
                            <button wire:click="createAsset" class="btn btn-dark">Create</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card mt-3 d-none" id="vehicle">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Vehicle Type</td>
                        <td>
                            <input wire:model="vehicleType" type="text" class="form-control">
                            @error('vehicleType') <span class="alert alert-danger">{{ $message }}</span><br> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Vehicle Brand</td>
                        <td>
                            <input wire:model="brand" type="text" class="form-control">
                            @error('brand') <span class="alert alert-danger">{{ $message }}</span><br> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Vehicle Model</td>
                        <td>
                            <input wire:model="model" type="text" class="form-control">
                            @error('model') <span class="alert alert-danger">{{ $message }}</span><br> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Vehicle Plate Number</td>
                        <td>
                            <input wire:model="plate" type="text" class="form-control">
                            @error('plate') <span class="alert alert-danger">{{ $message }}</span><br> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Vehicle Condition</td>
                        <td>
                            <select wire:model="condition" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Brand New">Brand New</option>
                                <option value="Pre-owned">Pre-owned</option>
                                <option value="Damaged">Damaged</option>
                            </select>
                            @error('condition') <span class="alert alert-danger">{{ $message }}</span><br> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Purchase Cost</td>
                        <td>
                            <input wire:model="cost" type="number" class="form-control">
                            @error('cost') <span class="alert alert-danger">{{ $message }}</span><br> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">
                            <button wire:click="createVehicle" class="btn btn-dark">Create Vechicle</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card mt-3 d-none" id="equipment">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Equipment Type</td>
                        <td>
                            <input wire:model="equipmentType" class="form-control" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Equipment Name</td>
                        <td>
                            <input wire:model="name" class="form-control" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Equipment Description</td>
                        <td>
                            <textarea wire:model="description" class="form-control" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>
                            <input wire:model="quantity" class="form-control" type="number">
                        </td>
                    </tr>
                    <tr>
                        <td>Pruchase Cost</td>
                        <td>
                            <input wire:model="cost" class="form-control" type="number">
                        </td>
                    </tr>
                   
                    <tr>
                        <td colspan="2" class="text-right">
                            <button wire:click="createNewEquipment" class="btn btn-dark">Add New Equipment</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
   </div>
   @push('scripts')
      <script>
        window.addEventListener('building-form', event => {
        var x = document.getElementById('building');
        x.classList.remove('d-none');
        })
        window.addEventListener('vehicle-form', event => {
        var x = document.getElementById('vehicle');
        x.classList.remove('d-none');
        })
        window.addEventListener('equipment-form', event => {
        var x = document.getElementById('equipment');
        x.classList.remove('d-none');
        })
        var picker = new Pikaday(
        {
        field: document.getElementById('date'),
        onSelect: function() {
        var data = this.getDate();
        @this.set('date', data);
        }
        });
    </script>
   @endpush
</div>
