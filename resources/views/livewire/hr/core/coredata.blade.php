<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Core Human Capital') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button data-toggle="modal" data-target="#CoreModal" class="btn btn-success">Add Record</button>
            <x-table head="Core Human Capital">
                <thead>
                    <th>No.</th>
                    <th>Item</th>
                    <th>Purchase Date</th>
                    <th>Purchase By</th>
                    <th>Amount</th>
                    <th>Paid By</th>
                    <th>Status</th>
                    <th>View</th>
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
                                <button class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No record found nigga!</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
        </div>
    </div>
   
        <div wire:ignore.self class="modal fade" id="CoreModal" tabindex="-1" role="dialog"
            aria-labelledby="CoreModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CoreModalLabel">Add new Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Item</label>
                            <input wire:model="item" class="form-control">
                            @error('item') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Purchase Date</label>
                            <input wire:model="purchasedate" class="form-control">
                            @error('purchasedate') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Purchase By</label>
                            <input wire:model="purchaseby" class="form-control">
                            @error('purchaseby') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Amount</label>
                            <input wire:model="amount" class="form-control">
                            @error('amount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Paid By</label>
                            <input wire:model="paidby" class="form-control">
                            @error('paidby') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Status</label>
                            <input wire:model="status" class="form-control">
                            @error('status') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            
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
