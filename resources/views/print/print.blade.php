<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewporoot" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>
    @forelse ($prints as $print)
  
    <table border="1px solid black">
    
        <thead>
            <td rowspan="2" position="center"><h4>Tech Trend Pay Slip</h4></center> </td>
            <th>
                Employee Name : {{$print->name}}
            </th>
            <th>
                Company : {{$print->company}} 
            </th>
            <th>
                Position : {{$print->position}} 
            </th>
        </thead>
        <thead>
            <th>Payroll Start : {{$print->datein}}</th>
            <th>Payroll End : {{$print->dateout}}</th>
            <th>Payday {{$print->dateout}}</th>
        </thead>
        <thead>
            <th colspan="2">Earning</th>
            <th colspan="2">Deduction</th>
        </thead>
        <tbody>
            <td colspan="2">
                
                Regular Pay           {{$print->payhour}}</br>
                Total Hours                    {{$print->totalhours}}</br>
                Overtime                      {{$print->overtime}}</br>
                Late                  {{$print->latededuction}}</br>
            </td>
            <td colspan="2">
                
                Social Security System                     {{$print->sss}} </br>
                Phil Health                              {{$print->phil}}</br>
                Pag-ibig                               {{$print->pagibig}}</br>
                Total Deduction                        {{$print->penstiondeduction}}</br>
            </td>
         
        </tbody>
        <td colspan="4">Total Salary : {{$print->salary}} </td>
    </table>
    @empty
        <tr>
            <td colspan="10" class="text-center">No Record Found</td>
        </tr>
    @endforelse
</body>
</html>

{{-- <div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Payroll') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Pay hour</th>
                    <th>Total Hours</th>
                    <th>Overtime</th>
                    <th>Late Deduction</th>
                    <th>Penstion Deduction</th>
                    <th>Salary</th>
                    <th>print</th>
                </thead>
                <tbody>
                    @forelse ($prints as $print)
                          <tr>
                            <td>{{$print->id}}</td>
                            <td>{{$print->name}}</td>
                            <td>{{$print->payhour}}</td>
                            <td>{{$print->totalhours}}</td>
                            <td>{{$print->overtime}}</td>
                            <td>{{$print->latededuction}}</td>
                            <td>{{$print->penstiondeduction}}</td>
                            <td>{{$print->salary}}</td>
                          </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No Record Found</td>
                            </tr>
                        @endforelse
                </tbody>
            </x-table>
        </div>
    </div> --}}