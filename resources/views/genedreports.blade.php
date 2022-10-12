<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
</head>
<body>
    <x-table head="General Ledger Report">
            
        <thead>
            <th>No.</th>
            <th>Date</th>
            <th>Description</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Encoded By</th>
            <th class="text-center">Action</th>
        </thead>
    
        <tbody>
            @forelse($journal_entries as +
            $key => $journal_entry)
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
                <td>{{$journal_entry->jencoded}}</td>
    
                <td class="text-center">
    
                    <button wire:click="updateLiabilities({{$journal_entry->id}})" class="btn btn-primary"> Edit
                    </button>
                    <button wire:click="delete({{$journal_entry->id}})" class="btn btn-danger"> Delete </button>
    
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="7">"Unlisted Records"</td>
            </tr>
            @endforelse
        </tbody>
    </x-table>
</body>
</html>