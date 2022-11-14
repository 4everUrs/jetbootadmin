<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SSS Payment</title>
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
                    <th class="text-center align-middle">SSS No.</th>
                    <th class="text-center align-middle">SSS Payment</th>
                </thead>
                <tbody>
                    @foreach ($payrolls as $payroll)
                        <tr>
                            <td class="text-center align-middle">{{$payroll->LocalEmployee->id}}</td>
                            <td class="text-center align-middle">{{$payroll->LocalEmployee->name}}</td>
                            <td class="text-center align-middle">{{$payroll->LocalEmployee->sss}}</td>
                            <td class="text-center align-middle">@print($payroll->sss)</td>
                            
                        </tr>
                        
                    @endforeach()
                    <tr>
                        <td class="align-middle text-right" colspan="3">Total:</td>
                            <td class="text-center align-middle">@print($total)</td>
                    </tr>

                   
                </tbody>
            </table>
        </div>
    </div>
    
</html>