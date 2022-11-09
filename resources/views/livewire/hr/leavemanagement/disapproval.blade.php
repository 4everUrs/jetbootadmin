<x-slot name="header">
    <h2 class="h4 font-weight-bold">
        {{ __('Disapprove Records') }}
    </h2>
</x-slot>
<div class="card">
    <div class="card-body">
        <x-table head="Leave Management">
            <thead class = "bg-info">
                <th>No.</th>
                <th>Name</th>
                <th>Type</th>
                <th>Position </th>
                <th>Reason</th>
                <th>Date Start</th>
                <th>Date end</th>
                <th>Status</th>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->position}}</td>
                        <td>{{$data->reason}}</td>
                        <td>{{$data->datestart}}</td>
                        <td>{{$data->datestart}}</td>
                        <td>{{$data->status}}</td>
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
