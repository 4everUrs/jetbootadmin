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
    public $role_id, $dept, $department_id;
    public $teams;
    public $name, $email, $phone, $username, $password;
    public $search = '';
    public function render()
    {
        return view('livewire.logistics.users', [
            'departments' => Team::where('user_id', Auth::user()->id)->get()
        ]);
    }
    public function saveUser()
    {

        $validatedData = $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'username' => 'required|string',
            'role_id' => 'required|integer',
            'password' => 'required|string|min:5'
        ]);

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
        toastr()->addSuccess('Data update successfully');
        $this->reset();
        $this->addUserModal = false;
    }
    function attachTeam(User $user)
    {
        if ($this->role_id == '1') {
            $team = Team::where('id', '=', $this->dept)->first();
        } else {
            $team = Team::where('name', '=', $this->department_id)->first();
        }

        $user->teams()->attach($team, array('role' => $user->role_id));

        $user->switchTeam($team);
    }
}
