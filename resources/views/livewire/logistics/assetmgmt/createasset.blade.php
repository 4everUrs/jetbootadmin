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
                <h1>Vehicle Form</h1>
            </div>
        </div>
        <div class="card mt-3 d-none" id="equipment">
            <div class="card-body">
                <h1>Equipment Form Form</h1>
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
