<!DOCTYPE html>
<html lang="en">
<Style>
button {
  background-color:blue;
  color: white;
  padding: 12px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  position: fixed;
  }
input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  }
  </style>
<head>
    <a href = "AtmController.php"></a>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Attendance</title>
</head>
<body>

    
<div class="card">
    <div class="card-body">

    <form  action="{{route('timein')}}" method="POST">
    
    Employee Name 
    <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
  

 
    </form>

    <form  action="{{route('breakin')}}" method="POST">
    
    Employee Number 
    <input type = "text" name="employee_id" class="btn btn-success"><i class='fa fa-edit'></i></button>
    

  

    <form  action="{{route('breakout')}}" method="POST">
       Employee Time In 
      <label for="appt"></label>
  <input type="time" id="appt" name="appt">
       </form>

    <form  action="{{route('timeout')}}" method="POST">
    Employee Time Out 
      <label for="appt"></label>
  <input type="time" id="appt" name="appt">
    </div>
</form>
</div>

<br> 
<center> <button>Submit</button> </center>


</body>
</html>