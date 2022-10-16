<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Budget Proposals') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Lists of Budget Proposal">
                <thead >
                    <th>No.</th>
                    <th>Proposal Name</th>
                    <th>Requestor</th>
                    <th>Requested Date</th>
                    <th>Proposed Amount</th>
                    <th>Approval Date</th>
                    <th>Approved Amount</th>
                    <th>Status</th>
                    <th>Remarks</th>               
                </thead>
                 <tbody>
                     @forelse($list_requesteds as $list_requested)
                    <tr>
                        <td>{{$list_requested->id}}</td>
                        <td>{{$list_requested->proposalname}}</td>
                        <td>{{$list_requested->requestor}}</td>
                        <td>{{$list_requested->created_at}}</td>
                        <td>{{$list_requested->proposedamount}}</td>
                        <td>{{$list_requested->approvedate}}</td>
                        <td>{{($list_requested->approvedamount)}}</td>
                        <td>{{$list_requested->rstatus}}</td>
                        <td>{{$list_requested->remarks}}</td>
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
