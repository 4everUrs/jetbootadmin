<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Contribution') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">SSS</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">PhilHealth</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Pagibig</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">SSS No.</th>
                            <th class="text-center">SSS Payment</th>
                        </thead>
                        <tbody>
                            @forelse ($payrolls as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->id}}</td>
                                <td class="text-center">{{$payroll->name}}</td>
                                <td class="text-center">{{$payroll->sss}}</td>
                                <td class="text-center">{{$payroll->sss}}</td>
                                
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">PhilHealth No.</th>
                            <th class="text-center">PhilHealth Payment</th>
                        </thead>
                        <tbody>
                            @forelse ($payrolls as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->id}}</td>
                                <td class="text-center">{{$payroll->name}}</td>
                                <td class="text-center">{{$payroll->philhealth}}</td>
                                <td class="text-center">{{$payroll->philhealth}}</td>
                                
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
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">Pagibig No.</th>
                            <th class="text-center">Pagibig Payment</th>
                        </thead>
                        <tbody>
                            @forelse ($payrolls as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->id}}</td>
                                <td class="text-center">{{$payroll->name}}</td>
                                <td class="text-center">{{$payroll->pagibig}}</td>
                                <td class="text-center">{{$payroll->pagibig}}</td>
                               
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
