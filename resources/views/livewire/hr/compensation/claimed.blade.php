<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Claimed Compensastion') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Compensation Planning">
                <thead class = "bg-info">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Base Pay</th>
                    <th>Benefits</th>
                    <th>Insentives</th>
                    <th>Insurance</th>
                    <th>Total</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->position}}</td>
                            <td>{{$data->basepay}}</td>
                            <td>{{$data->benefits}}</td>
                            <td>{{$data->insentives}}</td>
                            <td>{{$data->insurance}}</td>
                            <td>{{$data->overall}}</td>
                            <td>{{$data->status}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
        </div>
    </div>
</div>
