<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Collection Reports</title>
    </head>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 50%;
        }
        
        td, th {
          border: 1px solid #f59904;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #f59904;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <h3>Collection Reports</h3>
            <table class="table table-striped">
                <thead class="bg-info">
                    <th class="text-center align-middle">Name</th>
                    <th class="text-center align-middle">Account No.</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Particular</th>
                    <th class="text-center align-middle">Reference #</th>
                    <th class="text-center align-middle">Date Receive</th>
                    <th class="text-center align-middle">Mode of Payment</th>
                    <th class="text-center align-middle">Amount</th>
                </thead>
                <tbody>
                    @foreach($collects as $collect)
                        <tr>
                            <td class="text-center align-middle">{{$collect->cname}}</td>
                            <td class="text-center align-middle">{{$collect->caccountno}}</td>
                            <td class="text-center align-middle">{{$collect->cdescription}}</td>
                            <td class="text-center align-middle">{{$collect->cparticular}}</td>
                            <td class="text-center align-middle">{{$collect->creference}}</td>
                            <td class="text-center align-middle">{{$collect->cdatereceive}}</td>
                            <td class="text-center align-middle">{{$collect->cmodeofpayment}}</td>
                            <td class="text-center align-middle">{{$collect->camount}}</td>
                            
                        </tr>
                        
                    @endforeach()
                    <tr>
                        {{--<td class="align-middle text-right" colspan="8">Total:</td>
                            <td class="text-center align-middle">@print($grandcollection)</td>--}}
                    </tr>

                   
                </tbody>
            </table>
        </div>
    </div>
    
</html>


