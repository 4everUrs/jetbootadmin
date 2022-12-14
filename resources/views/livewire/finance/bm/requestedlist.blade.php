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
                    <th>Origin</th>
                    <th>Proposal Name</th>
                    <th>Requestor</th>
                    <th>Requested Date</th>
                    <th>Proposed Amount</th>
                    <th>Process Date</th>
                    <th>Attachment</th>
                    <th>Status</th>
                    <th>Remarks</th>  
                    <th class="text-center">Action</th>             
                </thead>
                 <tbody>
                     @forelse($list_requesteds as $list_requested)
                    <tr>
                        <td>{{$list_requested->id}}</td>
                        <td>{{$list_requested->origin}}</td>
                        <td>{{$list_requested->proposalname}}</td>
                        <td>{{$list_requested->requestor}}</td>
                        <td>{{($list_requested->created_at)->toFormattedDateString()}}</td>
                        <td>{{$list_requested->proposedamount}}</td>
                        <td>{{$list_requested->approvedate}}</td>
                        <td><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{($list_requested->attachment)}}" target="_blank" rel="noopener noreferrer">{{($list_requested->attachment)}}</a></td>
                        <td>{{$list_requested->rstatus}}</td>
                        <td>{{$list_requested->remarks}}</td>
                        <td class="text-center" >
                            <button wire:click="transfer({{$list_requested->id}})"  class="btn btn-info btn-sm"> Transfer</button>
                        </td>
                    </tr>
                     @empty
                     <tr>
                        <td class="text-center" colspan="10">"Unlisted Records"</td>
                    </tr>
                    @endforelse 
                </tbody>
            </x-table><br><br>
        </div>
    </div>

</div>
</div>

