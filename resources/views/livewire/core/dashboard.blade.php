<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="row form-group">
            <div class="col">
                <div class="row-lg-3 row-6">
                
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Applicant</p>
                        </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row-lg-3 row-6">
                
                    <div class="small-box bg-outline">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Vacant Job</p>
                        </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row-lg-3 row-6">
                
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Employee</p>
                        </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row-lg-3 row-6">
                
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>6</h3>
                            <p>Client</p>
                        </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Online Visitors</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                    </div>
                    
                </div>
                   
            </div>
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Online Applicants</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="applicantchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            const ctx = document.getElementById('lineChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                    datasets: [{
                        label: 'Last Week',
                        data: [5, 3, 7, 10],
                        backgroundColor: '#47484f',
                        borderColor: '#47484f',
                        borderWidth: 1,
                        fill: false,
                    },{
                        label: 'This Week',
                        data: [15, 25, 20, 10],
                        backgroundColor: '#3452eb',
                        borderColor: '#3452eb',
                        borderWidth: 1,
                        fill: false,
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

            const cty = document.getElementById('applicantchart').getContext('2d');
            const applicant = new Chart(cty, {
                type: 'bar',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                    datasets: [{
                        label: 'Last Week',
                        data: [0, 3, 7, 100],
                        backgroundColor: '#00ff00',
                        borderColor: '#00ff00',
                        borderWidth: 1,
                        fill: false,
                    },{
                        label: 'This Week',
                        data: [15, 36, 59, 200],
                        backgroundColor: '#ffaa00',
                        borderColor: '#ffaa00',
                        borderWidth: 1,
                        fill: false,
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
    </x-app-layout>
</div>
