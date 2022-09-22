<div>
  <!--EXPENSES TABLE-->
<div class="card">
    <div class="card-body">
        <a wire:click="expensescreate" class="btn btn-warning">+ Add Expenses</a>
        
        <x-table head="History of Expenses">
            <thead>
                <th>No.</th>
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
                    <td>{{$expense->id}}</td>
                    <td>{{$expense->eoriginated}}</td>
                    <td>{{$expense->ecategory}}</td>
                    <td>{{$expense->created_at}}</td>
                    <td>{{$expense->eamount}}</td>
                    <td>{{$expense->eaccount}}</td>
                    <td>{{$expense->edescription}}</td>
                    <td>{{$expense->estatus}}</td>
                    <td class="text-center">
                        <button wire:click="updateItems({{$expense->id}})"  class="btn btn-primary"> Edit </button>
                    <button wire:click="delete({{$expense->id}})"  class="btn btn-danger"> Delete </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="9">"Unlisted Records"</td>
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
<x-jet-dialog-modal wire:model="addExpense">
    <x-slot name="title">
        {{ __('Add RequestBudget') }}
    </x-slot>

    <x-slot name="content">
    <div class="row form-group">
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
                @error('eoriginated') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
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
                @error('eammount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
            <div class="form-group"></div>
            <label>Description</label>
            <textarea wire:model="edescription"class="form-control">   
            </textarea>
            @error('edescription') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('addExpense')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
       
        <x-jet-button class="ms-2" wire:click="addExpenses" wire:loading.attr="disabled">
            {{ __('Update Expenses') }}
        </x-jet-button>

    </x-slot>
        
</x-jet-dialog-modal>
<!--pop up form EXPENSES-->

<!--UPDATE MODAL-->
<x-jet-dialog-modal wire:model="updateItem">
    <x-slot name="title">
        {{ __('Update Expenses Record') }}
    </x-slot>

    <x-slot name="content">
        <div class="row form-group">
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
                    @error('eoriginated') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
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
                    @error('eammount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                </div>
                <div class="form-group"></div>
                <label>Description</label>
                <textarea wire:model="edescription"class="form-control">   
                </textarea>
                @error('edescription') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
        </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('updateItem')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        {{--wala kang main function para makapag update ng database--}}
        <x-jet-button class="ms-2" wire:click="mainUpdateFunction" wire:loading.attr="disabled">
            {{ __('Update Expenses') }}
        </x-jet-button>

    </x-slot>
</x-jet-dialog-modal>
<!--UPDATE MODAL-->


<!--delete modal-->
<x-jet-dialog-modal wire:model="deleteRequest">
    <x-slot name="title">
        {{ __('Delete') }}
    </x-slot>
    <x-slot name="content">
    <h4>Are you sure to Delete this Expenses?</h4>
    </x-slot>

    <x-slot name="footer">
        {{--wrong function calling --}}
    <x-jet-button class="ms-2" wire:click="deleteItem" wire:loading.attr="disabled">
            {{ __('Delete Expenses') }}
     </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
<!--delete modal-->
</div>
