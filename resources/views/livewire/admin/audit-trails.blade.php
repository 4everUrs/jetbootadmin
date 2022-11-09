<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Trail') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body" style="height:500px;overflow-y:scroll">
           
               <x-table head="Logs">
                    <thead class="bg-info">
                        <th class="text-center align-middle">No</th>
                        <th class="text-center align-middle">Name</th>
                        <th class="text-center align-middle">Type</th>
                        <th class="text-center align-middle">Date</th>
                        <th class="text-center align-middle">Time</th>
                        <th class="text-center align-middle">Platform</th>
                        <th class="text-center align-middle">IP</th>
                        <th class="text-center align-middle">Old Value</th>
                        <th class="text-center align-middle">New Value</th>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td class="text-center align-middle">{{$log->id}}</td>
                                <td class="text-center align-middle">{{$log->user->name}}</td>
                                <td class="text-center align-middle">{{$log->log_type}}</td>
                                <td class="text-center align-middle">@date($log->log_datetime)</td>
                                <td class="text-center align-middle">{{$log->humanize_datetime}}</td>
                                <td class="text-center align-middle">{{$log->request_info['user_agent']}}</td>
                                <td class="text-center align-middle">{{$log->request_info['ip']}}</td>
                                <td class="text-center align-middle"></td>
                                <td class="text-center align-middle"></td>
                            </tr>
                        @endforeach
                    </tbody>
               </x-table>

        </div>
    </div>
</div>
