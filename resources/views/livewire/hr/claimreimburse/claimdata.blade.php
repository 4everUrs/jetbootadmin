<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Claim And Reimbursement') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Claim And Reimbursement">
                <thead class = "bg-info">
                    <th>No.</th>
                    <th>Item</th>
                    <th>Purchase Date</th>
                    <th>Purchase By</th>
                    <th>Amount</th>
                    <th>Paid By</th>
                    <th>Status</th>
                    <th class="text-center">View</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->item}}</td>
                            <td>{{$data->purchasedate}}</td>
                            <td>{{$data->purchaseby}}</td>
                            <td>{{$data->amount}}</td>
                            <td>{{$data->paidby}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <button wire:click = "approveModal({{$data->id}})" class="btn btn-primary">Approve</button>
                                <button wire:click = "disapproveModal({{$data->id}})" class="btn btn-secondary">Disapprove</button>
                            
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No record found</td>
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
                            <label>Item</label>
                            <input wire:model="item" class="form-control">
                            @error('item') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Purchase Date</label>
                            <input type = "date" wire:model="purchasedate" class="form-control">
                            @error('purchasedate') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Purchase By</label>
                            <input wire:model="purchaseby" class="form-control">
                            @error('purchaseby') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Amount</label>
                            <input wire:model="amount" class="form-control">
                            @error('amount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Paid Using</label>
                            <input wire:model="paidby" class="form-control">
                            @error('paidby') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
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
                                {{ __('confirm') }}
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
