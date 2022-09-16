@props(['head'])
<div>
    <div class="card-header">
        <h3 class="card-title">{{$head}}</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
    
            </div>
        </div>
    </div>
    
    <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap table-striped table-hover table-bordered">
           {{$slot}}
        </table>
    </div>
</div>