<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Contracts') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li wire:ignore class="nav-item mr-2" role="presentation">
                    <button class="nav-link active" id="Active-tab" data-bs-toggle="tab" data-bs-target="#Active" type="button"
                        role="tab" aria-controls="Active" aria-selected="true">Active</button>
                </li>
                <li wire:ignore class="nav-item mr-2" role="presentation">
                    <button class="nav-link" id="Terminated-tab" data-bs-toggle="tab" data-bs-target="#Terminated" type="button"
                        role="tab" aria-controls="Terminated" aria-selected="false">Terminated</button>
                </li>
                <li wire:ignore class="nav-item" role="presentation">
                    <button class="nav-link" id="Applicants-tab" data-bs-toggle="tab" data-bs-target="#Applicants" type="button"
                        role="tab" aria-controls="Applicants" aria-selected="false">Applicants</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div wire:ignore.self class="tab-pane fade show active" id="Active" role="tabpanel" aria-labelledby="Active-tab">
                    <div class="card">
                        <div class="card-body">
                           <x-table head="Suppliers Lists">
                                <thead class="bg-info">
                                    <th class="text-center align-middle">Company Name</th>
                                    <th class="text-center align-middle">Company Address</th>
                                    <th class="text-center align-middle">Company Phone</th>
                                    <th class="text-center align-middle">Company Email</th>
                                    <th class="text-center align-middle">Start of contract</th>
                                    <th class="text-center align-middle">End of contract</th>
                                    <th class="text-center align-middle">Status</th>
                                    <th class="text-center align-middle">Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($active as $supplier)
                                    <tr>
                                        <td class="text-center align-middle">{{$supplier->name}}</td>
                                        <td class="text-center align-middle">{{$supplier->address}}</td>
                                        <td class="text-center align-middle">{{$supplier->phone}}</td>
                                        <td class="text-center align-middle">{{$supplier->email}}</td>
                                        <td class="text-center align-middle">@date($supplier->start)</td>
                                        <td class="text-center align-middle">@date($supplier->end)</td>

                                        @if ($supplier->status == 'Inactive')
                                        <td class="text-danger text-center">{{$supplier->status}}</td>
                                        @else
                                        <td class="text-center align-middle">{{$supplier->status}}</td>
                                        @endif
                            
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-dark btn-md dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    ...
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <button wire:click="sendPO({{$supplier->id}})" class="dropdown-item">Send P.O</button>
                                                    <button wire:click="loadRenewModal({{$supplier->id}})" class="dropdown-item">Renew</button>
                                                    <button wire:click="changeStatus({{$supplier->id}})" class="dropdown-item">Terminate</button>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </x-table>
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="tab-pane fade" id="Terminated" role="tabpanel" aria-labelledby="Terminated-tab">
                    <x-table head="Suppliers Lists">
                        <thead class="bg-info">
                            <th class="text-center align-middle">Company Name</th>
                            <th class="text-center align-middle">Company Address</th>
                            <th class="text-center align-middle">Company Phone</th>
                            <th class="text-center align-middle">Company Email</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Termination Date</th>
                            <th class="text-center align-middle">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($terminated as $supplier)
                            <tr>
                                <td class="text-center align-middle">{{$supplier->name}}</td>
                                <td class="text-center align-middle">{{$supplier->address}}</td>
                                <td class="text-center align-middle">{{$supplier->phone}}</td>
                                <td class="text-center align-middle">{{$supplier->email}}</td>
                                @if ($supplier->status == 'Inactive')
                                <td class="text-danger text-center">{{$supplier->status}}</td>
                                <td class="text-danger text-center">@date($supplier->updated_at)</td>
                                @else
                                <td class="text-center">{{$supplier->status}}</td>
                                @endif
                    
                                <td class="text-center">
                                    <button wire:click="activate({{$supplier->id}})" class="btn btn-success btn-sm">Activate</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                </div>
                <div wire:ignore.self class="tab-pane fade" id="Applicants" role="tabpanel" aria-labelledby="Applicants-tab">
                    <div class="card">
                        <div class="card-body">
                            <x-table head="Applicants">
                                <thead class="bg-info">
                                    <th class="text-center align-middle">No</th>
                                    <th class="text-center align-middle">Item Name</th>
                                    <th class="text-center align-middle">Company Name</th>
                                    <th class="text-center align-middle">Company Email</th>
                                    <th class="text-center align-middle">Company Phone</th>
                                    <th class="text-center align-middle">Bid Amount</th>
                                    <th class="text-center align-middle">Bidding Proposal</th>
                                    <th class="text-center align-middle">Status</th>
                                    <th class="text-center align-middle">Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($applicants as $applicant)
                                        <tr>
                                            <td class="text-center align-middle">{{$applicant->id}}</td>
                                            <td class="text-center align-middle">{{$applicant->post->item_name}}</td>
                                            <td class="text-center align-middle">{{$applicant->name}}</td>
                                            <td class="text-center align-middle">{{$applicant->email}}</td>
                                            <td class="text-center align-middle">{{$applicant->phone}}</td>
                                            <td class="text-center align-middle">@money($applicant->bid_amount)</td>
                                            @if (!empty($applicant->bid_proposal_file))
                                            <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$applicant->bid_proposal_file}}"
                                                    target="_blank">Attachment</a></td>
                                            @else
                                            <td></td>
                                            @endif
                                            @if ($applicant->status == 'Sent')
                                                <td class="text-center align-middle">Pending</td>
                                            @else
                                                <td class="text-center align-middle">{{$applicant->status}}</td>    
                                            @endif
                                            <td class="text-center align-middle">
                                                @if ($applicant->status == 'Awarded')
                                                    <button wire:click="award({{$applicant->id}})" class="btn btn-secondary btn-sm" disabled>Award</button>
                                                @else
                                                    <button wire:click="award({{$applicant->id}})" class="btn btn-dark btn-sm">Award</button>
                                                    <button wire:click="sendInvitation({{$applicant->id}})" class="btn btn-primary btn-sm">Send Invitation</button>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No Record Found</td>
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
    <x-jet-dialog-modal wire:model="awardingModal">
        <x-slot name="title">
            {{__('Awarding Invitation')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Venue</label>
                <input wire:model="venue" type="text" class="form-control">
                <label for="">Date</label>
                <input wire:model="date" type="date" class="form-control">
                <label for="">Time</label>
                <input wire:model="time" type="time" class="form-control">
                <label for="">Subject</label>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('awardingModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="sendInvi" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Yes') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="invitationModal">
        <x-slot name="title">
            {{__('Send Invitation')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Venue</label>
                <input wire:model="venue" type="text" class="form-control">
                <label for="">Date</label>
                <input wire:model="date" type="date" class="form-control">
                <label for="">Time</label>
                <input wire:model="time" type="time" class="form-control">
                <label for="">Subject</label>
                <select wire:model="subject" class="form-control">
                    <option value="">Choose...</option>
                    <option value="Supplier">Supplier</option>
                    <option value="Contractor">Contractor</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('invitationModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="sendInvi" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Yes') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="awardModal">
        <x-slot name="title">
            {{__('Award as Supplier')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Contract Terms</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="contract" class="form-control" type="number">
                    </div>
                    <div class="col">
                        <select wire:model="terms" class="form-control">
                            <option value="months">Months</option>
                            <option value="years">Years</option>
                        </select>
                    </div>
                </div>
                <label for="">Venue</label>
                <input wire:model="venue" type="text" class="form-control">
                <label for="">Date</label>
                <input wire:model="date" type="date" class="form-control">
                <label for="">Time</label>
                <input wire:model="time" type="time" class="form-control">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('awardModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="awarding" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Ok') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
    {{-- <x-jet-dialog-modal wire:model="awardModal">
        <x-slot name="title">
            {{__('Award as Supplier')}}
        </x-slot>
        <x-slot name="content">
            <h3>Are you sure to award this supplier?</h3>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('awardModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="awarding" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Yes') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal> --}}
    <x-jet-dialog-modal wire:model="poSend">
        <x-slot name="title">
            {{__('Send Purchase Order')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Purchase Order ID</label>
                <input wire:model="po_id" type="text" class="form-control">
                <label>Purchase Order File</label>
                <input wire:model="file_name" type="file" class="form-control">
                 @error('file_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('poSend')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="send" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Send') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="renewModal">
        <x-slot name="title">
            {{__('Award as Supplier')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Contract Terms</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="contract" class="form-control" type="number">
                    </div>
                    <div class="col">
                        <select wire:model="terms" class="form-control">
                            <option value="months">Months</option>
                            <option value="years">Years</option>
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('renewModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="renew" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Ok') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
