<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Lists of Payables') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
           

           <x-table head="Payables Listing">

                <thead class="bg-secondary table-sm">
                    <th>Date</th>
                    <th>Name</th>
                    <th>Attachment</th>
                    <th>Remarks</th>    
                    <th>Status</th>
                </thead>

                <tbody>
                    @forelse($paid as $paids)
                    <tr>
                        <td>{{($paids->created_at)->toFormattedDateString()}}</td>
                        <td>{{$paids->lpname}}</td>
                        <td><a href="https://mnlph.nyc3.digitaloceanspaces.com'/{{$paids->lpattachment}}" target="_blank" rel="noopener noreferrer">{{$paids->lpattachment}}</a></td>
                        <td>{{$paids->lpremarks}}</td>
                        <td>{{$paids->lpstatus}}</td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">"Unlisted Payables"</td>
                    </tr>
                    @endforelse
                </tbody>
            </x-table><br>
            
        </div>
    </div>



</div>
