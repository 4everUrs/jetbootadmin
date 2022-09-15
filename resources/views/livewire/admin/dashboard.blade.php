<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="card">
            <x-table head="Request Test">
                <thead>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">No Record</td>
                    </tr>
                </tbody>
            </x-table>
        </div>
    </x-app-layout>
</div>
