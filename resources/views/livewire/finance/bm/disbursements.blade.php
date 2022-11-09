<div>
    <div>
        <x-slot name="header">
                    <h2 class="h4 font-weight-bold">
                        {{ __('Disbursement') }}
                    </h2>
                </x-slot>
    </div>
    


    <div class="card">
         <div class="card-body">
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                
    </head>
    <body>
        
    </body>
    </html>
            <a class="btn btn-success"href="{{route('export')}}">Export</a>

            <x-table head="History of Disbursement Transaction">
                <thead >
                    <th>No.</th>
                    <th>Originated Dept</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Account</th>
                    <th>Description</th>
                    <th>Status</th> 
                    <th class="text-center">Action</th>
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
                        <td>{{$transaction->status}}</td>
                        <td class="text-center" >
                           
                            <button wire:click="approvedBudget({{$transaction->id}})"  class="btn btn-primary"> Approved </button>
                            <button wire:click="denyBudget({{$transaction->id}})"  class="btn btn-danger"> Deny </button>
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
                {{$transactions->links()}}
            </div>
            </div>
    </div>
</div>





</div>
