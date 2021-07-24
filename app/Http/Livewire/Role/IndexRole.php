<?php

namespace App\Http\Livewire\Role;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class IndexRole extends Component
{
    public $show = false;
    public $search, $search_user;
    public $name, $role_id;
    protected $listeners = ['roleAdded' => 'refreshPage'];

    public function refreshPage()
    {
        session()->flash('message', 'Successfully created');
        $roles = Role::latest()->paginate(5);
        $users = User::latest()->paginate(5);
    }

    public function render()
    {
        $roles = Role::latest()->paginate(5);
        $users = User::latest()->paginate(5);
        if($this->search !== null || $this->search_user !== null){
            $roles = Role::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(5);
            $users = User::where('name', 'like', '%' . $this->search_user . '%')->latest()->paginate(5);
        }
        return view('livewire.role.index-role', compact('roles', 'users'))
            ->extends('layouts.backend')
            ->section('content');
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        session()->flash('message', 'Role ' .$role->name.' telah dihapus');
    }
}
