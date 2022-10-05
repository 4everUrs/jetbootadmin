<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UsersList extends Component
{
    public $addUserModal = false;
    public $role_id, $dept, $department_id;
    public $teams;
    public $departments;
    public $name, $email, $phone, $username, $password;
    public function render()
    {
        if (!empty($this->role_id)) {
            if ($this->role_id == '1') {
                $this->teams = Team::where('user_id', '=', '1')->get();
            } elseif ($this->role_id == '2') {
                $this->teams = Team::where('user_id', '=', '1')->get();
                $this->departments = Team::where('user_id', '=', $this->dept)->get();
                $this->dispatchBrowserEvent('showDepartment');
            }
        }
        return view('livewire.admin.users-list', [
            'users' => User::all(),

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
        $user->save();

        $this->attachTeam($user);
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
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
    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->username = null;
        $this->password = null;
        $this->role_id = null;
        $this->department_id = null;
        $this->departments = null;
        $this->dept = null;
    }
    public function loadModal()
    {
        $this->addUserModal = true;
    }
}
