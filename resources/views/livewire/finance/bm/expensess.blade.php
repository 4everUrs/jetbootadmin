<div>
   <!--EXPENSES FORM -->
<div class="card">
    <div class="card-body">
        <button class="btn btn-warning" data-toggle="modal" data-target="#create">+ Add Expenses</button>
    <x-table head="History of Expenses">
        <thead >
            <th>Name</th>
            <th>Category</th>
            <th>Date</th>
            <th>Ammount</th>
            <th>Account</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($expenses as $expense)
            <tr>
                <td>{{$expense->eoriginated}}</td>
                <td>{{$expense->ecategory}}</td>
                <td>{{$expense->created_at}}</td>
                <td>{{$expense->eamount}}</td>
                <td>{{$expense->eaccount}}</td>
                <td>{{$expense->edescription}}</td>
                <td>{{$expense->estatus}}</td>
                <td>
                <button class="btn btn-success">View</button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="8">"Unlisted Records"</td>
            </tr>
            @endforelse
        </tbody>
    </x-table>
    
    </div>
    
    </div>
   <!--EXPENSES FORM --> 
</div>
