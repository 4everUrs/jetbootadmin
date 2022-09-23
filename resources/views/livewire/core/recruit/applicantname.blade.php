<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold" style="margin-left:350px">
         {{ __('List of Applicant') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="List of Applicants">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
            </thead>
            <tbody>
                <tr>
                    <td>Core</td>
                    <td>core@gmail.com</td>
                    <td>09123456780</td>
                    <td>Quezon City</td>
                </tr>
            </tbody>
           </x-table>
        </div>
    </div>
    
    
</div>