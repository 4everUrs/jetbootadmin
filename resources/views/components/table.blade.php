@props(['head'])
<div>
    <div class="card-header">
        <h3 class="card-title">{{$head}}</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <input wire:model='search' type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
        
            </div>
        </div>
    </div>
    
    <div class="card-body p-0 table-responsive" style="overflow-x: auto">
        <table class="table table-striped text-wrap table-hover table-bordered" id="dtBasicExample">
           {{$slot}}
        </table>
    </div>
</div>