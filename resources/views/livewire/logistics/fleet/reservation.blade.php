<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle Reservation') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="true">List</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Vehicle Reservation Form Request</button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="list" role="tabpanel" aria-labelledby="list-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="Vehicle Reservation List">
                        <thead>
                            <th>Department Name</th>
                            <th>Vehicle Type</th>
                            <th>Destination</th>
                            <th>Status.</th>
                        </thead>
                    </x-table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <label>Vehicle Reservation Request Form</label>
                    <ul>
                        <li> Note: You must obtain departmental approval prior to reserving a vehicle and have the necessary travel approval prior to making this vehicle reservation request.</li>
                        <li>Additional reminders:
                            <ul>
                                <li>Driver must have a valid driver's license to show when picking up a vehicle.</li>
                                <li>Driver listed on the reservation must be the person who picks up the vehicle unless an alternative has been approved in advance.</li>
                                <li>Please list additional drivers and special requests in "comments" box, if applicable.</li>
                                <li>The department renting the vehicle is responsible for any vehicle damage occurring while in the possession of the driver</li>
                                <li>Your request is not a reservation until you receive a confirmation.</li>
                                <li>Motor Pool hours are 7:30 am - 4:30 pm Monday - Friday. If your car is needed prior to Motor Pool opening at 7:30 am, the vehicle keys can be picked up between 3:30 pm and 4:30 pm the prior workday afternoon, at no additional charge. Please note in the comments section below if you need this early key pick up.</li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <label for="name">Department Name</label>
                        <input wire:model="Department" type="text" class="form-control">
                        <div class="form-group">
                            <label for="name">Destination</label>
                            <input wire:model="location" type="text" class="form-control">
                            <div class="form-group">
                            <label for="name">Driver Name</label>
                            <input wire:model="Drivers" type="text" class="form-control">
                            <div class="form-group">
                                <label>Vehicle Type</label>
                                <select wire:model="type" class="form-control">
                                    <option>Please Select Type</option>
                                    <option>SUV</option>
                                    <option>Truck</option>
                                    <option>Mini Van</option>
                                    <option>Sedan</option>
                                </select>
                                <label>Comments</label>
                                <textarea wire:model="comments" class="form-control"></textarea>
                                

                              
                                
                    </ul>

                    <x-jet-button class="ms-2" wire:click="sendRequest" wire:loading.attr="disabled">
                                    {{ __('Send Request') }}
                                </x-jet-button>
                              
                </div>
            </div>