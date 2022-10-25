<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Onboarding') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadOnboard" type="create" class="btn btn-success" style="float:right"><i class='fa fa-plus'></i> Add Onboard</button>
            <br><br>
           <x-table head="">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Age</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Contract Term</th>
                <th class="text-center">Status</th>
                <th class="text-center">Resume</th>
                <th class="text-center">Contract Date</th>
                <th class="text-center">Action</th> 
                

               
            </thead>
            <tbody>
                @forelse ($onboards as $onboard)
                      <tr>
                        <td class="text-center">{{$onboard->id}}</td>
                        <td class="text-center">{{$onboard->name}}</td>
                        <td class="text-center">{{$onboard->age}}</td>
                        <td class="text-center">{{$onboard->gender}}</td>
                        <td class="text-center">{{$onboard->company_name}}</td>
                        <td class="text-center">{{$onboard->position}}</td>
                        <td class="text-center">{{$onboard->contract}}</td>
                        <td class="text-center">{{$onboard->status}}</td>
                        <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$onboard->resume_file}}" target="__blank">Resume</a></td>
                        <td class="text-center">{{$onboard->created_at}}</td>
                        <td class="text-center">
                            <button wire:click="submit({{$onboard->id}})" class="btn btn-sm btn-primary"><i class='fa fa-share'></i> Send to Employee Mngt. </button>
                        </td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showOnboard">
        <x-slot name="title">
            {{ __('Create New Hire Onboard Data') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                
                <label for="">Name</label>
                <select wire:model="name"class="form-control" type="text">
                    <option value="">Select Name</option>
                    @foreach ($onboards as $onboard)
                    <option value="{{$onboard->id}}">{{$onboard->name}}</option>
                    @endforeach
                </select>
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Age</label>
                <input wire:model="age"class="form-control" type="number">
                @error('age') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Gender</label>
                <select wire:model="gender"class="form-control" type="text">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
                <label for="">Contract Term</label>
                <input wire:model="contract"class="form-control" type="text">
                @error('contract') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
            
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showOnboard')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveOnboard" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>