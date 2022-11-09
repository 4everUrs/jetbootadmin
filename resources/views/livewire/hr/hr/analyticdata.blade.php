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
                        <h3>{{$employees}}</h3>
                        <p>employees</p>
                    </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row-lg-3 row-6">
            
                <div class="small-box bg-outline">
                    <div class="inner">
                        <h3>{{$times}}</h3>
                        <p>Attendance</p>
                    </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col">
            <div class="row-lg-3 row-6">
            
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$leaves}}</h3>
                        <p>Leaves</p>
                    </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                     </div>
            </div>
        </div>
        <div class="col">
            <div class="row-lg-3 row-6">
            
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$compensations}}</h3>
                        <p>Compensations</p>
                    </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                     </div>
            </div>
        </div>
    </div>
</div>
