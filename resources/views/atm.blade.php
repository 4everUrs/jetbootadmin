<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="card">
    <div class="card-body">

    <form  action="{{route('timein')}}" method="POST">
    @csrf
    enter Employee number 
    <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
    <br>
    time in
    <button type = "submit" name="timein" class="btn btn-success"><i class='fa fa-edit'>Time in</i></button>
    <br>
    </form>

    <form  action="{{route('breakin')}}" method="POST">
    @csrf
    enter Employee number 
    <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
    <br>
    break in
    <button type = "submit" name="breakin" class="btn btn-success"><i class='fa fa-edit'>break in</i></button>
    <br>
    </form>

    <form  action="{{route('breakout')}}" method="POST">
    @csrf
    enter Employee number 
    <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
    <br>
    break out
    <button type = "submit" name="breakout"  class="btn btn-success"><i class='fa fa-edit'>break out</i></button>
    <br>
    </form>

    <form  action="{{route('timeout')}}" method="POST">
    @csrf
    enter Employee number 
    <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
    <br>
    timeout
    <button type = "submit" name="timeout"  class="btn btn-success"><i class='fa fa-edit'>time out</i></button>
    </div>
</form>
</div>

<a href="{{route('uleave')}}">apply for leave</a>
<a href="{{route('uclaims')}}">apply for claim</a>
<button>apply for change shift</button>


    
</body>
</html>