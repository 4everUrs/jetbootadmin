<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Bidders List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Bidders">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Company Name</th>
                    <th class="text-center align-middle">Company Email</th>
                    <th class="text-center align-middle">Company Phone</th>
                    <th class="text-center align-middle">Bid Amount</th>
                    <th class="text-center align-middle">Bidding Proposal</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($bidders as $bidder)
                        <tr>
                            <td class="text-center">{{$bidder->id}}</td>
                            <td class="text-center align-middle">{{$bidder->name}}</td>
                            <td class="text-center align-middle">{{$bidder->email}}</td>
                            <td class="text-center align-middle">{{$bidder->phone}}</td>
                            <td class="text-center align-middle">@money($bidder->bid_amount)</td>
                            @if (!empty($bidder->bid_proposal_file))
                                <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$bidder->bid_proposal_file}}"target="_blank">Attachment</a></td>
                            @else
                                <td></td>    
                            @endif
                            
                            <td class="text-center">{{$bidder->status}}</td>
                            <td>
                                <button wire:click="loadModal({{$bidder->id}})" class="btn btn-dark btn-sm">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="viewBidderDetails" maxWidth="xl">
        <x-slot name="title">
            {{__('Post to Shop')}}
        </x-slot>
        <x-slot name="content">
           <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            @if (!empty($postDetail))
                                <p>Type: <label>{{$postDetail->type}}</label></p>
                                <p>Description: <label>{{$postDetail->description}}</label></p>
                                <p>Location: <label>{{$postDetail->location}}</label></p>
                                <p>Bid Range: <label>@money($postDetail->start) - @money($postDetail->end)</label></p>
                                <p>Requirements: <label></label></p>
                                
                                {{-- @foreach ($datas as $data)
                                <li>{{$data->requirements}}</li>
                                @endforeach --}}
                            @endif
                            
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            @if (!empty($bidderDetail))
                                <p>Company Name: <label>{{$bidderDetail->name}}</label></p>
                                <p>Company Email: <label>{{$bidderDetail->email}}</label></p>
                                <p>Company Phone: <label>{{$bidderDetail->phone}}</label></p>
                                <p>Bid Amount: <label>@money($bidderDetail->bid_amount)</label></p>
                                <p>Company Name: <label>{{$bidderDetail->name}}</label></p>
                                
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('viewBidderDetails')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="awarding" class="ms-2" id="createButton"  wire:loading.attr="disabled">
                {{ __('Award') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
