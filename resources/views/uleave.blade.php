<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form  action="{{route('leaving')}}" method="POST">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" ><br>

        <label for="">type</label>
        <input type="text" name="type"><br>

        <label for="">position</label>
        <input type="text" name="position"><br>

        <label for="">reason</label>
        <input type="text" name="reason"><br>

        <label for="">datestart</label>
        <input type="date" name="datestart"><br>

        <label for="">dateend</label>
        <input type="date" name="dateend"> <br>
        
        <input type="submit" name="leaving">

    </form>
</body>
</html>