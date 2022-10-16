<div>
<x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('MRO Inventory') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-dark btn-sm">Request Item</button>
            <x-table head="Inventory List">
                <thead class="bg-info">
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Inventory Value</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" colspan="7">No Record Found</td>
                    </tr>
                </tbody>
            </x-table>
        </div>
    </div>
</div>
