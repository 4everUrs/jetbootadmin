<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="List of Applicant">
            <thead>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Address</th>
                <th class="text-center">Action</th>

               
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">Core</td>
                    <td class="text-center">core@gmail.com</td>
                    <td class="text-center">09123456780</td>
                    <td class="text-center">Quezon City</td>
                    
                </tr>
            </tbody>
           </x-table>
        </div>
    </div>
</div>
