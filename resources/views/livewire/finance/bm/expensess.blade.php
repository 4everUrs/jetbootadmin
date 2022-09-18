<div>
  <!--EXPENSES TABLE-->
<div class="card">
    <div class="card-body">
        <button class="btn btn-warning" data-toggle="modal" data-target="#expensescreate">+ Add Expenses</button>
        <x-table head="History of Expenses">
            <thead>
                <th>Name</th>
                <th>Category</th>
                <th>Date</th>
                <th>Ammount</th>
                <th>Account</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse($expenses as $expense)
                <tr>
                    <td>{{$expense->eoriginated}}</td>
                    <td>{{$expense->ecategory}}</td>
                    <td>{{$expense->created_at}}</td>
                    <td>{{$expense->eamount}}</td>
                    <td>{{$expense->eaccount}}</td>
                    <td>{{$expense->edescription}}</td>
                    <td>{{$expense->estatus}}</td>
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
            {{$expenses->links()}}
        </div>
    </div>

</div>
<!--EXPENSES TABLE-->

<!--pop up form EXPENSES-->
<x-modal id="expensescreate" title="Request Budget Form" function="savedata">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label>Name:</label>
                <input wire:model="eoriginated" type="text" class="form-control">
                    
                </select>
                <label>Category</label>
                <select wire:model="ecategory"class="form-control">
                    <option>Select Category</option>
                    <option>Food</option>
                    <option>Transportation </option>
                    <option>Office Supplies</option>
                    <option>Miscellaneous</option>
                    <option>Health</option>
                    <option>Maintenance</option>
                    <option>Water&Electricity Bills</option>
                </select>
            </div>

            <div class="col">
                <label>Amount</label>
                <input wire:model="eamount" type="number" class="form-control">
                <label>Account</label>
                <select wire:model="eaccount"class="form-control">
                    <option>Select Account</option>
                    <option>CASH</option>
                    <option>ACCOUNT </option>
                    <option>CARD</option>
                </select>
            </div>
    </div>
            <label>Description</label>
            <textarea wire:model="edescription"class="form-control">   
            </textarea>
    </div>
        
</x-modal>
<!--pop up form EXPENSES-->


</div>
