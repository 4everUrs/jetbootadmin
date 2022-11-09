<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$assetsCount}}</h3>
                    <p>Assets</p>
                </div>
                <div class="icon">
                    <i class='fas fa-hand-holding-usd' style='font-size:65px'></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$vehicleCount}}</h3>
                    <p>Vehicle</p>
                </div>
                <div class="icon">
                    <i class='fas fa-truck' style='font-size:65px'></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$inventoryCount}}</h3>
                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class='fas fa-dolly' style='font-size:65px'></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{$supplierCount}}</h3>
                    <p>Suppliers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>0</h3>
                    <p>Contractor</p>
                </div>
                <div class="icon">
                    <i class='fas fa-hard-hat' style='font-size:65px'></i>
                </div>
                <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{$orderCount}}</h3>
                    <p>Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart" style="font-size:65px"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$orderCount}}</h3>
                    <p>Projects</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file" style="font-size:65px"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
    
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$orderCount}}</h3>
                    <p>Partner Autoshop</p>
                </div>
                <div class="icon">
                    <i class="fa fa-car" style="font-size:65px"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Online Store Visitors</h3>
                <a href="javascript:void(0);">View Report</a>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$nov->count()}}</span>
                    <span>Visitors Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                </p>
            </div>
    
            <div class="position-relative mb-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="visitors-chart" height="200" width="487" style="display: block; width: 487px; height: 200px;"
                    class="chartjs-render-monitor"></canvas>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                </span>
                <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                </span>
            </div>
        </div>
    </div>
 @push('scripts')
 
     <script>
        const ctx = document.getElementById('visitors-chart').getContext('2d');
        const myChart = new Chart(ctx, {
        type: 'line',
        data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','August','Sept','Oct','Nov','Dec'],
        datasets: [{
        label: 'Last Month',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0 ,0 , 1 ,0],
        backgroundColor: '#7c8184',
        borderColor: '#7c8184',
        borderWidth: 1,
        fill: false,  
        tension: 0.1  
        },
        {
        label: 'This Month',
        data: [0, 0, 0, 0, 0, 0,0,0,0,0,{{$nov->count()}},0],
        backgroundColor: '#0275d8',
        borderColor: '#0275d8',
        borderWidth: 1,
        fill: false,
        tension: 0.1
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
