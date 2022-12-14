<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Analytics & Report') }}
        </h2>
    </x-slot>
    <div class="row form-group">
        <div class="col">
            <div class="row-lg-3 row-6">
            
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$applicants}}</h3>
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
                        <h3>{{$vacants}}</h3>
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
                        <h3>{{$localemployees}}</h3>
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
                        <h3>{{$clients}}</h3>
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
</div>
