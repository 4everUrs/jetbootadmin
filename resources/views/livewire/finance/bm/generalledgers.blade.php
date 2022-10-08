<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('General Ledger Reports') }}
        </h2>
    </x-slot>


<a class="btn btn-info"href="{{route('generalreports')}}">Download PDF</a>

<x-table head="General Ledger Report">
            
    <thead>
        <th>No.</th>
        <th>Date</th>
        <th>Description</th>
        <th>Debit</th> 
        <th>Credit</th>
       
        <th class="text-center">Action</th>
    </thead>

    <tbody>
        @forelse($journal_entries as $key => $journal_entry)
        <tr>
            <td>{{$journal_entry->id}}</td>
            <td>{{$journal_entry->created_at}}</td>
            <td>
                {{-- <table class="table table-striped">
                   @foreach ($childData[$key] as $index => $sub)
                       <tr>
                            <td>{{$childData[$key][$index]->jdescription}}</td>
                       </tr>
                   @endforeach
                </table> --}}
            </td>  
            <td>
                {{-- <table class="table table-striped">
                    @foreach ($childData[$key]  as $index => $sub)
                       <tr>
                            <td>{{$childData[$key][$index]->jdebit}}</td>
                       </tr>
                   @endforeach
                 </table> --}}
            </td>  
            <td>
                {{-- <table class="table table-striped">
                    @foreach ($childData[$key]  as $index => $sub)
                       <tr>
                            <td>{{$childData[$key][$index]->jcredit}}</td>
                       </tr>
                   @endforeach
                 </table> --}}
            </td>  
          
            <td class="text-center">

                <button wire:click="ViewGeneralLed({{$journal_entry->id}})" class="btn btn-success"> View
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-center" colspan="7">"Unlisted Records"</td>
        </tr>
        @endforelse
    </tbody>
</x-table><br><br>
<button wire:click="ViewGeneralLed" class="btn btn-danger btn-lg"> TOTAL </button>

{{--View Records Modal--}}
<x-jet-modal wire:model="ViewGenLed">
    <x-slot name="title">
        {{('View Records')}}
    </x-slot>

    <x-slot name="content">
        <label>Date</label>
        {{--<label>{{$dataGenled->created_at}}</label>--}}
    </x-slot>


    <x-slot name="footer">

    </x-slot>
</x-jet-modal>
</div>


  
