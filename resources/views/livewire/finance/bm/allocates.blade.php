<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Allocating Budget') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Annual Budget</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Logistics</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Finance</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
            
                            <x-table head="Annual Budget" class="text-center">
            
                                <thead>
                                    <th>Year</th>
                                    <th>Budget</th>
                                    <th>Logistics 20 %</th>
                                    <th>Core 30%</th>
                                    <th>HR 30%</th>
                                    <th>Finance20%</th>
                                </thead>
                                <tbody>
                                    <td>2022</td>
                                    <td>10,200,000</td>
                                    <td>2,040,000</td>
                                    <td>3,060,000</td>
                                    <td>3,060,000</td>
                                    <td>2,040,000</td>
                                </tbody>



                            </x-table>
            
                         </div>
                    </div>
                </div>
            </div>
      
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
            
                            <x-table head="Logistics">
                                <thead>
                                    <th>Department Amount Budget</th>
                                    <th>Operating Budget 30 %</th>
                                    <th>Financial Budget 15 %</th>
                                    <th>Cash Budget 10%</th>
                                    <th>Labor Budget 15%</th>
                                    <th>Strategic Plan Budget 30%</th>
                                </thead>
                                <tbody>
                                    <td>2,040,000</td>
                                    <td>612,000</td>
                                    <td>306,000</td>
                                    <td>204,000</td>
                                    <td>306,000</td>
                                    <td>612,000/td>
                                </tbody>
                            </x-table>
            
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>

          
       




        
            
        

    
</div>