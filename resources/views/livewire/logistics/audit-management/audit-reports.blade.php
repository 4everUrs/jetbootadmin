<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Annually Audit Report</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-center">
                        <strong>Sales: 1 Jan, 2020 - 30 Dec, 2022</strong>
                    </p>
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
    
                        <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 680px;"
                            width="680" class="chartjs-render-monitor"></canvas>
                    </div>
    
                </div>
    
                <div class="col-md-4">
                    <p class="text-center">
                        <strong>Goal Completion</strong>
                    </p>
                    <div class="progress-group">
                        Add Products to Cart
                        <span class="float-right"><b>160</b>/200</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                        </div>
                    </div>
    
                    <div class="progress-group">
                        Complete Purchase
                        <span class="float-right"><b>310</b>/400</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                        </div>
                    </div>
    
                    <div class="progress-group">
                        <span class="progress-text">Visit Premium Page</span>
                        <span class="float-right"><b>480</b>/800</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                    </div>
    
                    <div class="progress-group">
                        Send Inquiries
                        <span class="float-right"><b>250</b>/500</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">₱ 35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                    </div>
    
                </div>
    
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">₱ 10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                    </div>
    
                </div>
    
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">₱ 24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                    </div>
    
                </div>
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">₱ 24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                    </div>
    
                </div>
                
            </div>
    
        </div>
    
    </div>


    @push('scripts')
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'],
                datasets: [{
                    label: 'Last Year',
                    data: [25000, 35000, 30000, 15000, 40000, 45000,50000,38000,43000,30000,70000,90000],
                    backgroundColor: '#1d2a3d',
                    borderColor: '#1d2a3d',
                    borderWidth: 1
                    
                },
            {
            label: 'This Year',
            data: [98000, 100000, 134000, 154000, 134000, 130000,104000,100000,90000,110000,124000,134000],
            backgroundColor: '#0a6af7',
            borderColor: '#0a6af7',
            borderWidth: 1
            
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    @endpush
</div>
