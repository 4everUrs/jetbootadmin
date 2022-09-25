<div>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold" style="margin-left:290px">
         {{ __('List of Applicants') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
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
                    <td class="text-center"><button type="text" class="btn btn-primary">Approved</button>
                    <button type="alert" class="btn btn-danger">Denied</button></td>
                </tr>
            </tbody>
           </x-table>
        </div>
    </div>
    
    
</div>