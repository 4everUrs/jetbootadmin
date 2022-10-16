<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Request lists">
                <thead >
                    <th>Id</th>
                    <th>Originated Dept</th>
                    <th>Requestor Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Approval Date</th>
                    <th>Status</th>
                    
                </thead>
                 <tbody>
                     @forelse($list_requesteds as $list_requested)
                    <tr>
                        <td>{{$list_requested->id}}</td>
                        <td>{{$list_requested->origdept}}</td>
                        <td>{{$list_requested->requestor}}</td>
                        <td>{{$list_requested->created_at}}</td>
                        <td>{{$list_requested->ramount}}</td>
                        <td>{{$list_requested->rdescription}}</td>
                        <td>{{$list_requested->approvedate}}</td>
                        <td>{{$list_requested->rstatus}}</td>
                    </tr>
                     @empty
                     <tr>
                        <td class="text-center" colspan="9">"Unlisted Records"</td>
                    </tr>
                    @endforelse  
                </tbody>
            </x-table><br><br>
        </div>
    </div>
</div>
