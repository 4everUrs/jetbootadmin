<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Purchase Order') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click='showModal' class="btn btn-primary">Create Purchase Order</button>
            <x-table head="Purchase Order">
                <thead>
                    <th>No.</th>
                    <th>Supplier Name.</th>
                    <th>Purchase Order ID.</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($puchase_orders as $po)
                        <tr>
                            <td>{{$po->id}}</td>
                            <td>{{$po->supplier_name}}</td>
                            <td><a href="#" wire:click="download({{$po->id}})">{{$po->po_id}}</a></td>
                            <td class="text-center">
                                <button wire:click='showPoView({{$po->id}})' class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center"colspan="4">No Record found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            <div class="mt-3  float-right">
                {{$puchase_orders->links()}}
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="poModal" maxWidth="lg">
        <x-slot name="title">
            {{ __('Create a Purchase Order') }}
        </x-slot>
        <x-slot name="content">
           <div class="form-group">
                <label>To.</label>
                <select wire:model="supplier_id" class="form-control mb-2">
                    <option value="">Select Option</option>
                    @forelse ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @empty
                        <option value="-">No Supplier</option>
                    @endforelse
                </select>
                @error('supplier_id') <span class="text-danger">{{ $message }}</span><br> @enderror
                <label>Item(s)</label>
                <button wire:click="addRow" class="btn btn-sm btn-success">Add Row</button>
                <div class="input-group mb-2">
                    @foreach ($itemContainer as $index => $product)
                       <div class="row">
                            <div class="col mt-2">
                                <input placeholder="Item" name="itemContainer[{{$index}}][item]" wire:model.defer="itemContainer.{{$index}}.item" class="form-control" style="width: 300px" type="text">
                                @error('supplier_id') <span class="text-danger">{{ $message }}</span><br> @enderror
                            </div>
                            <div class="col mt-2">
                                <input placeholder="Quantity" name="itemContainer[{{$index}}][qty]" wire:model.defer="itemContainer.{{$index}}.qty" class="form-control mr-2" type="number">
                                @error('supplier_id') <span class="text-danger">{{ $message }}</span><br> @enderror
                            </div>
                            <div class="col mt-2">
                                <div class="input-group">
                                    <input placeholder="Cost per piece" name="itemContainer[{{$index}}][cost]" wire:model.defer="itemContainer.{{$index}}.cost" type="number" class="form-control">
                                    @error('supplier_id') <span class="text-danger">{{ $message }}</span><br> @enderror
                                    <button wire:click="removeRow({{$index}})" class="btn btn-small btn-danger float-right mx-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <label>Summary</label>  
                <table class="table table-striped">
                   <thead>
                        <th>Qty</th>
                        <th>Item Description</th>
                        <th class="text-right">Total Cost</th>
                   </thead>
                   <tbody>
                      @foreach ($preview as $item)
                          <tr>
                            <td>{{$item['qty']}}</td>
                            <td>{{$item['item']}}</td>
                            <td class="text-right">@money($item['totalcost'])</td>
                          </tr>
                      @endforeach
                   </tbody>
                   <tfoot>
                    <tr>
                        <td class="text-right" colspan="2">Subtotal:</td>
                        <td class="text-right">@money($subtotal)</td>
                    </tr>
                   </tfoot>
                </table>
           </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('poModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <button wire:click="total" class="btn btn-success">Review</button>
        
            <x-jet-button class="ms-2" wire:click="createPO" wire:loading.attr="disabled">
                {{ __('Create P.O') }}
            </x-jet-button>

        </x-slot>
        
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="poView" maxWidth="xl">
        <x-slot name="title">
            {{ __('Purchase Order') }}
        </x-slot>
        
        <x-slot name="content">
           <livewire:logistics.procurement.view-p-o>
        </x-slot>
        
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('poView')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        
            <x-jet-button class="ms-2" wire:click="#" wire:loading.attr="disabled">
                {{ __('Download') }}
            </x-jet-button>
        
        </x-slot>
    </x-jet-dialog-modal>
    
</div>