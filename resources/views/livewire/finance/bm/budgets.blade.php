<div>
<x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Transaction') }}
            </h2>
        </x-slot>

<div class="card">
<div class="card-body">
    <button class="btn btn-success" data-toggle="modal" data-target="#create"><i class="fa fa-file"></i> Add Records</button>
    <x-table head="History of Budget Requests">
        <thead >
            <th>Originated Dept</th>
            <th>Category</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Account</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
            <tr>
                <td>{{$transaction->originated}}</td>
                <td>{{$transaction->category}}</td>
                <td>{{$transaction->created_at}}</td>
                <td>{{$transaction->amount}}</td>
                <td>{{$transaction->account}}</td>
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->status}}</td>
                <td>
                <button class="btn btn-success">View</button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="8">"Unlisted Records"</td>
            </tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="mt-3 float-right">
        {{$transactions->links()}}
    </div>
</div>

</div>

@livewire("finance.bm.expensess")

<!--pop up form budget request-->

<x-modal id="create" title="Request Budget Form" function="savedata">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label>Select Originated Dept.</label>
                <select wire:model="originated" class="form-control">
                    <option>HR DEPT</option>
                    <option>LOGISTICS DEPT</option>
                    <option>CORE</option>
                    <option>FINANCE</option>
                </select>
                <label>Category</label>
                <select wire:model="category"class="form-control">
                    <option>Operating budget</option>
                    <option>Financial budget </option>
                    <option>Cash Budget </option>
                    <option>Labor Budget</option>
                    <option>Strategic Plan</option>
                </select>
            </div>
            <div class="col">
                <label>Amount</label>
                <input wire:model="amount" type="number" class="form-control">

                <label>Account</label>
                <select wire:model="account"class="form-control">
                    <option>CASH</option>
                    <option>ACCOUNT </option>
                    <option>CARD</option>
                </select>
            </div>
        </div>
            <label>Description</label>
            <textarea wire:model="description"class="form-control">   
            </textarea>
    </div>
        
</x-modal>
<!--pop up form budget request-->


</div>
