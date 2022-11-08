<?php

namespace App\Http\Livewire\Logistics;

use Livewire\Component;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $addUserModal;
    public $role_id = '2', $dept, $department_id;
    public $teams;
    public $name, $email, $phone, $username, $password;
    public $search = '';
    public function render()
    {
        return view('livewire.logistics.users', [
            'departments' => Team::where('user_id', Auth::user()->id)->get(),
            'users' => User::where('role_id', '=', '2')->get(),
        ]);
    }
    public function saveUser()
    {
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->username = $this->username;
        $user->password = Hash::make($this->password);
        $user->role_id = $this->role_id;
        $user->type = 'Employee';
        $user->status = 'Active';
        $user->save();

        $this->attachTeam($user);
        toastr()->addSuccess('Account created succesfully');
        $this->reset();
        $this->addUserModal = false;
    }
    function attachTeam(User $user)
    {
        $team = Team::where('id', '=', $this->department_id)->first();

        $user->teams()->attach($team, array('role' => $user->role_id));

        $user->switchTeam($team);
    }
}
