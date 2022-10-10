<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('General Ledger Reports') }}
        </h2>
    </x-slot>


<a class="btn btn-info"href="{{route('generalreports')}}">Download PDF</a>
<div class="card">
    <div class="card-body">

        <x-table head="General Report ">
            <thead>
                <th></th>
                <th>2022</th>
                
            </thead>
        <tbody>
            <tr>
                <td><h2>Liabilities</h2></td>
                <td></td>
                
            </tr>
            <tr>
                <td>Accounts Payable</td>
                <td></td>
                
            </tr>
            <tr>
                <td>Income Tax Payable</td>
                <td></td>
                
            </tr>
            <tr>
                <td>Interest Payable</td>
                <td></td>
                
            </tr>
            <tr>
                <td>Accrued Expenses</td>
                <td></td>
                
            </tr>
            <tr>
                <td>Unearned Payable</td>
                <td></td>
                
            </tr>
                
                
             
        </tbody>


         </x-table>
    </div>
</div>
</div>


  
