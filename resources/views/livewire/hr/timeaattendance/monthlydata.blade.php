<x-slot name="header">
    <h2 class="h4 font-weight-bold">
        {{ __('Monthly Records') }}
    </h2>
</x-slot>
<div class="card">
    <div class="card-body">
        <x-table head="Time And Attendance">
            <thead class = "bg-info">
                <th>No.</th>
                <th>Name</th>
                <th>Position </th>
                <th>Department </th>
                <th>Time In</th>
                <th>Break In</th>
                <th>Break Out</th>
                <th>Time Out</th>
                <th>Date</th>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->position}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->timein}}</td>
                        <td>{{$data->breakin}}</td>
                        <td>{{$data->breakout}}</td>
                        <td>{{$data->timeout}}</td>
                        <td>{{$data->date}}</td>
                      
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No record found</td>
                    </tr>
                @endforelse
            </tbody>
        </x-table>
        {{$datas->links()}}
    </div>
</div>