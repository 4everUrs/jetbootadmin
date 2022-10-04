<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Recieved Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Request Lists">
                <thead>
                    <th>No.</th>
                    <th>Origin</th>
                    <th>Type</th>
                    <th>Bidding Range</th>
                    <th>Location</th>   
                    <th>Data Posted</th>
                    <th>Status</th>
                    <th>Actiom</th>


                </thead>
                <tbody>
                    @forelse ($recieveds as $recieved)
                    <tr>
                        <td>{{$recieved->id}}</td>
                        <td>{{$recieved->origin}}</td>
                        <td>{{$recieved->type}}</td>
                        <td>@money($recieved->start) - @money($recieved->end)</td>
                        <td>{{$recieved->location}}</td>
                        <td>{{Carbon\Carbon::parse($recieved->updated_at)->toFormattedDateString()}}</td>
                        <td>{{$recieved->status}}</td>
                        <td class="text-center">
                            <button wire:click="loadModal({{$recieved->id}})" class="btn btn-primary">View</button>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6"> no record found</td>
                    </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="postModal">
        <x-slot name="title">
            {{ __('Post') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Type:</label>
                <br>
                <p class="badge badge-success">{{$data->type}}</p><br>
                <label>Description:</label>
                <p>{{$data->description}}</p>
                <label>Bidding Range:</label><br>
                @money($recieved->start) - @money($recieved->end)<br>
                <label>Location:</label><br>
                {{$data->location}}<br>
                <label>Requirements:</label>
                @foreach ($datas as $data)
                <li>{{$data->requirements}}</li>
                @endforeach
                

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('postModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" wire:click="savePost({{$recieved->id}})" wire:loading.attr="disabled">
                {{ __('Save Post') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>