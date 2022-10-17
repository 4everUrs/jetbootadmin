<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Trail') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           
          <x-table head="Audit Logs">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Operation</th>
                <th>Model</th>
                <th>Old Values</th>
                <th>New Values</th>
                <th>Date</th>
            </thead>
            <tbody>
                @foreach ($audits as $audit)
               
                {{-- <tr>
                    <td>{{$audit['id']}}</td>
                    <td>{{$audit->user_type}}</td>
                    <td>{{$audit->event}}</td>
                    <td>{{$audit->auditable_type}}</td>
                    <td>{{$audit->old_values}}</td>
                    <td style="width: 20%">{{$audit->new_values}}</td>
                    <td>{{Carbon\Carbon::parse($audit->created_at)->toFormattedDateString()}}</td>
                </tr> --}}
                @endforeach
            </tbody>
          </x-table>
        </div>
    </div>
</div>
