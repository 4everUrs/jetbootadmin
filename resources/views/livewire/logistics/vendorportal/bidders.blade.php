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
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Quantity</th>
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
                            <td class="text-center">{{$bidder->Post->item_name}}</td>
                            <td class="text-center">{{$bidder->Post->quantity}}</td>
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
                                @if ($bidder->status == 'Pending')
                                    <button wire:click="loadModal({{$bidder->id}})" class="btn btn-dark btn-sm">View</button>
                                @else
                                    <button wire:click="loadModal({{$bidder->id}})" class="btn btn-secondary btn-sm" disabled>View</button>
                                @endif
                              
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
                <div class="card card-primary">
                    <div class="card-header">
                        {{__('Post Detail')}}
                    </div>
                    <div class="card-body">
                        @if (!empty($postDetail))
                            <table class="table table-bordered">
                                <tr>
                                    <td>Type</td>
                                    <td>{{$postDetail->type}}</td>
                                </tr>
                                <tr>
                                    <td>Item Name</td>
                                    <td>{{$postDetail->item_name}}</td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td>{{$postDetail->quantity}}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{$postDetail->description}}</td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>{{$postDetail->location}}</td>
                                </tr>
                                <tr>
                                    <td>Bid Range</td>
                                    <td>@money($postDetail->start) - @money($postDetail->end)</td>
                                </tr>
                                <tr>
                                    <td>Requirements</td>
                                    <td>
                                        @foreach ($postDetail->getRequirements as $req)
                                            <li>{{$req->requirements}}</li>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-secondary">
                    <div class="card-header">
                        {{__('Bidder Detail')}}
                    </div>
                    <div class="card-body">
                       @if (!empty($bidderDetail))
                           <table class="table table-bordered">
                                <tr>
                                    <td>Company Name</td>
                                    <td>{{$bidderDetail->name}}</td>
                                </tr>
                                <tr>
                                    <td>Company Email</td>
                                    <td>{{$bidderDetail->email}}</td>
                                </tr>
                                <tr>
                                    <td>Company Phone</td>
                                    <td>{{$bidderDetail->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Company Address</td>
                                    <td>{{$bidderDetail->address}}</td>
                                </tr>
                                <tr>
                                    <td>Bid Amount</td>
                                    <td>@money($bidderDetail->bid_amount)</td>
                                </tr>
                                
                            </table>
                       @endif
                        
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
                {{ __('Send') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
