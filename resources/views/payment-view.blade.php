<table class="table table-striped">
    <thead class="bg-gray">
        <th class="text-center align-middle">Employee ID</th>
        <th class="text-center align-middle">Employee Nane</th>
        <th class="text-center align-middle">Bank Name</th>
        <th class="text-center align-middle">Bank Account</th>
        <th class="text-center align-middle">Salary</th>
    </thead>
    <tbody>
      @if (!empty($employees))
            @foreach ($employees as $employee)
                <tr>
                    <td class="text-center align-middle">{{$employee->LocalEmployee->id}}</td>
                    <td class="text-center align-middle">{{$employee->LocalEmployee->name}}</td>
                    <td class="text-center align-middle">{{$employee->LocalEmployee->bank_name}}</td>
                    <td class="text-center align-middle">{{$employee->LocalEmployee->bank_account}}</td>
                    <td class="text-center align-middle">{{$employee->net_salary}}</td>
                    
                </tr>
              
            @endforeach()
            <tr>
                <td class="align-middle text-right" colspan="4">Total:</td>
                    <td class="text-center align-middle">@print($total)</td>
            </tr>
      @endif

       
    </tbody>
</table>