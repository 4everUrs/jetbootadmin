<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Report') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col">
            <div class="card" style="height: 429.38px">
                <div class="card-body">
                    <button class="btn btn-dark btn-sm">Request Audit Report</button>
                    <x-table head="Reports">
                        <thead class="bg-info">
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Origin</th>
                            <th class="text-center align-middle">Attachment</th>
                            <th class="text-center align-middle">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($audits as $audit)
                            <tr>
                                <td class="text-center align-middle">{{$audit->id}}</td>
                                <td class="text-center align-middle">{{$audit->origin}}</td>
                                <td class="text-center align-middle">{{$audit->audit_file}}</td>
                                <td class="text-center align-middle">
                                    <a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$audit->audit_file}}" target="__blank"
                                        class="btn btn-dark btn-sm">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-gradient">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Sales Graph
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="line-chart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="396"
                        height="250"></canvas>
                </div>
            
               <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <h5 class="description-header">₱ 35,210.43</h5>
                            <span class="description-text">TOTAL SALES</span>
                        </div>
            
                    </div>
            
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            
                            <h5 class="description-header">15</h5>
                            <span class="description-text">SOLD ITEM</span>
                        </div>
            
                    </div>
            
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                           
                            <h5 class="description-header">₱ 24,813.53</h5>
                            <span class="description-text">TOTAL PROFIT</span>
                        </div>
            
                    </div>
            
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                            
                            <h5 class="description-header">25</h5>
                            <span class="description-text">IN-STORE</span>
                        </div>
            
                    </div>
                </div>
            
            </div>
            
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
            labels: ['Q1','Q2','Q3','Q4'],
            datasets: [{
            data: [86,114,106,106],
            label: "Last Week",
            borderColor: "#3e95cd",
            fill: false
            }, {
            data: [282,350,411,502],
            label: "This Week",
            borderColor: "#8e5ea2",
            fill: false
            }
            ]
            },
            options: {
            title: {
            display: true,
            text: 'Total Sales Monthly'
            }
            }
            });
        </script>
    @endpush
</div>
