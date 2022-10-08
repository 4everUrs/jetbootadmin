<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disbursement Transaction</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
           <x-table head="History of Budget Requests">
               <thead >
                   <th>No.</th>
                   <th>Originated Dept</th>
                   <th>Category</th>
                   <th>Date</th>
                   <th>Amount</th>
                   <th>Account</th>
                   <th>Description</th>
                   
                   
               </thead>
               <tbody>
                   @forelse($transactions as $transaction)
                   <tr>
                       <td>{{$transaction->id}}</td>
                       <td>{{$transaction->originated}}</td>
                       <td>{{$transaction->category}}</td>
                       <td>{{$transaction->created_at}}</td>
                       <td>{{$transaction->amount}}</td>
                       <td>{{$transaction->account}}</td>
                       <td>{{$transaction->description}}</td>
                     
                       
                   </tr>
                   @empty
                   <tr>
                       <td class="text-center" colspan="9">"Unlisted Records"</td>
                   </tr>
                   @endforelse
               </tbody>
           </x-table>
           </div>
   </div>
    
</body>
</html>