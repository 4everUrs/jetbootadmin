<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Shift And Schedule') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Add Record</button>
            <x-table head="Shift And Schedule">
                <thead class = "bg-info">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position </th>
                    <th>Department</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->department}}</td>
                            <td>{{$data->monday}}</td>
                            <td>{{$data->tuesday}}</td>
                            <td>{{$data->wednesday}}</td>
                            <td>{{$data->thursday}}</td>
                            <td>{{$data->friday}}</td>
                            <td>{{$data->saturday}}</td>
                            <td>{{$data->sunday}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
        </div>
    </div>
    <x-jet-dialog-modal wire:model="addRecord">
        <x-slot name="title">
            {{ __('Add new Record') }}
        </x-slot>
        <x-slot name="content">
                        <div class="form-group">
                            <label>Name</label>
                            <input wire:model="name" class="form-control">
                            @error('name') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Position</label>
                            <input wire:model="position" class="form-control">
                            @error('position') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Department</label>
                            <input wire:model="department" class="form-control">
                            @error('department') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Monday</label>
                            <select wire:model="monday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('monday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Tuesday</label>
                            <select wire:model="tuesday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('tuesday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Wednesday</label>
                            <select wire:model="wednesday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('wednesday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Thursday</label>
                            <select wire:model="thursday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('thursday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Friday</label>
                            <select wire:model="friday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('friday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Saturday</label>
                            <select wire:model="saturday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('saturday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <label>Sunday</label>
                            <select wire:model="sunday" class="form-control">
                                <option></option>
                                <option>8am - 5pm</option>
                                <option>10pm - 7pm</option>
                                <option>1pm - 10pm</option>
                                <option>Rest Day</option>
                            </select>
                            @error('sunday') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                        </div>
                    </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('addRecord')" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-jet-secondary-button>
                            <x-jet-button class="ms-2" wire:click="saveData" wire:loading.attr="disabled">
                                {{ __('Add new Record') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-dialog-modal>         
</div>
