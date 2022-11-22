<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Income Statements') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
    
            <x-table head="">
                <thead class="bg-warning table-lg">
                    <th class="text-left">Revenue</th>
                    <th class="text-left">Amount</th>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-left"">Asset Paid Fees</td>
                        <td class="left">8000</td> 
                    </tr>
                    <tr>
                        <td class="text-left"">Inventory Sales</td>
                        <td class="text-left">1,200</td> 
                    </tr>

                    <tr>
                        <td  class="table-dark" class="text-left">Total Amount</td>
                        <td class="table-dark" class="text-left" > ₱ 9,200</td>
                    </tr>
                </tbody>
    
                <thead class="bg-warning table-lg">
                    <th class="text-left">Expenses</th>
                    <th class="text-left">Amount</th>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-left"">Cash Dividends Payable</td>
                        <td class="left">1,200</td> 
                    </tr>
                    <tr>
                        <td class="text-left"">Miscellaneous Fee</td>
                        <td class="text-left">2,500</td> 
                    </tr>

                    <tr>
                        <td  class="table-dark" class="text-left">Total Amount</td>
                        <td class="table-dark" class="text-left" > ₱ 2,700</td>
                    </tr>
                    <tr>
                        <td  class="table-dark" class="text-left">Net Income</td>
                        <td class="table-dark" class="text-left" > ₱ 6,700</td>
                    </tr>
                </tbody>
                
    
                
            </x-table><br><br>
            
        </div>
    </div>

<div>