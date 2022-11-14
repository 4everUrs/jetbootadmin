<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Lists of Receivables') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           

           <x-table head="Receivable Listing">

                <thead class="bg-secondary table-sm">
                    <th>Date</th>
                    <th>Name</th>
                    <th>Attachment</th>    
                    <th>Remarks</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse($receivable as $receivables)
                    <tr>
                        <td>{{$receivables->created_at}}</td>
                        <td>{{$receivables->lrname}}</td>
                        <td>{{$receivables->lrattachment}}</td>
                        <td>{{$receivables->lrremarks}}</td>
                        <td>{{$receivables->lrstatus}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">"Unlisted Receivable"</td>
                    </tr>
                    @endforelse
                </tbody>
           </x-table>


        </div>
    </div>
</div>
