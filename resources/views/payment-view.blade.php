<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Payment</title>
    </head>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="bg-gray">
                    <th class="text-center align-middle">Employee ID</th>
                    <th class="text-center align-middle">Employee Name</th>
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
                                <td class="text-center align-middle">@print($employee->net_salary)</td>
                                
                            </tr>
                        
                        @endforeach()
                        <tr>
                            <td class="align-middle text-right" colspan="4">Total:</td>
                                <td class="text-center align-middle">@print($total)</td>
                        </tr>
                @endif
        
                
                </tbody>
            </table>
        </div>
    </div>
    
</html>