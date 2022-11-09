<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Employee Record') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
        enter Employee number 
        <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
        <br>
        time in
        <a  href="{{route('timein')}}" class="btn btn-success"><i class='fa fa-edit'>Time in</i></a>
        <br>
        break in
        <button wire:click="breakin" class="btn btn-success"><i class='fa fa-edit'>break in</i></button>
        <br>
        break out
        <button wire:click="breakout" class="btn btn-success"><i class='fa fa-edit'>break out</i></button>
        <br>
        timout
        <button wire:click="timeout" class="btn btn-success"><i class='fa fa-edit'>time out</i></button>
        </div>
    </div>
    
    
</div>