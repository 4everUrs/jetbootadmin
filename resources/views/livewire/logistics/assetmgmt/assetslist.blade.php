<div>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Assets List') }}
            </h2>
        </x-slot>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Work Force</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation ">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Buildings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab"
                            aria-controls="contact" aria-selected="false">Vechicle</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Employee">
                                    <thead>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Type</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->currentTeam->name}}</td>
                                                @if ($user->role_id == '0')
                                                <td>Admin</td>
                                                @elseif ($user->role_id == '1')
                                                <td>Manager</td>
                                                @elseif ($user->role_id == '2')
                                                <td>Staff</td>
                                                @elseif ($user->role_id == '3')
                                                <td>Client</td>
                                                @endif
                                                <td>{{$user->type}}</td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
            </div>
        </div>
</div>
