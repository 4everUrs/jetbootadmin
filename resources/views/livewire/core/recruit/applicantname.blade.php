<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
         {{ __('List of Applicant') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
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
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <label>Name</label>
            <form action="" class="form-group">
                <input class="form-control" type="text" name="" id="">
            </form>
            <label>Email</label>
            <form action="" class="form-group">
                <input class="form-control" type="string" email="" id="">
            </form>
            <label>Contact</label>
            <form action="" class="form-group">
                <input class="form-control" type="string" contact="" id="">
            </form>
            <label>Address</label>
            <form action="" class="form-group">
                <input class="form-control" type="string" address="" id="">
            </form>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>

    <div class="form-group" style="margin-right:560px">
        <div class="row">
            <div class="col">
                <br><br><br>
                <label>Select</label>
                <select class="form-control">
                    <option>1</option>        
                    <option>2</option>        
                    <option>3</option>        
                    <option>4</option>
                </select>
        
                <label>Category</label>
                <select class="form-control">
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>
    <button type="alert" class="btn btn-danger">Cancel</button>
    
</div>