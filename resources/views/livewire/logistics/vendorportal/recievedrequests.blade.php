<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Recieved Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item mr-2" role="presentation">
                    <button class="nav-link active" id="procurement-tab" data-bs-toggle="tab" data-bs-target="#procurement" type="button"
                        role="tab" aria-controls="procurement" aria-selected="true">Procurement</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="mro-tab" data-bs-toggle="tab" data-bs-target="#mro" type="button"
                        role="tab" aria-controls="mro" aria-selected="false">M.R.O</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="procurement" role="tabpanel" aria-labelledby="procurement-tab">
                    <div class="card">
                        <div class="card-body">
                            <x-table head="Procurement Request Lists">
                                <thead class="bg-info">
                                    <th>No.</th>
                                    <th>Origin</th>
                                    <th>Type</th>
                                    <th>Bidding Range</th>
                                    <th>Location</th>
                                    <th>Data Posted</th>
                                    <th>Status</th>
                                    <th>Action</th>
                            
                            
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
                                        <td class="text-center" colspan="8"> no record found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </x-table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mro" role="tabpanel" aria-labelledby="mro-tab">
                    <div class="card">
                        <div class="card-body">
                            <x-table head="M.R.O Request Lists">
                                <thead class="bg-info">
                                    <th>No.</th>
                                    <th>Type</th>
                                    <th>Content</th>
                                    <th>Location</th>
                                    <th>Data Posted</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($requests as $request)
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td>{{$request->type}}</td>
                                        <td>{{$request->content}}</td>
                                        <td>{{$request->location}}</td>
                                        <td>{{$request->created_at}}</td>
                                        <td>{{$request->status}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Post</button>
                                            <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                    
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="7"> no record found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
            
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
               @if (!empty($data))
                   <p class="badge badge-success">{{$data->type}}</p><br>
                    <label>Description:</label>
                    <p>{{$data->description}}</p>
                    <label>Bidding Range:</label><br>
                    @money($recieved->start) - @money($recieved->end)<br>
                    <label>Location:</label><br>
                    {{$data->location}}<br>
               @endif
                @if (!empty($datas))
                    <label>Requirements:</label>
                        @foreach ($datas as $data)
                        <li>{{$data->requirements}}</li>
                        @endforeach
                @endif
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('postModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

           @if (!empty($recieveds))
               <x-jet-button class="ms-2" wire:click="savePost" wire:loading.attr="disabled">
                    {{ __('Save Post') }}
                </x-jet-button>
           @endif
        </x-slot>
    </x-jet-dialog-modal>


</div>