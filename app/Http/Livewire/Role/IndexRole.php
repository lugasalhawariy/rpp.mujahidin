<?php

namespace App\Http\Livewire\Role;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class IndexRole extends Component
{
    use WithPagination;
    public $show = false;
    public $search, $search_user;
    public $name, $role_id;
    protected $listeners = [
        'roleAdded' => 'refreshPage', 
        'updateProfile' => 'refreshPage'
    ];

    public function refreshPage()
    {
        session()->flash('message', 'Successfully created');
        $roles = Role::latest()->paginate(10);
        
        if(auth()->user()->hasRole('superadmin')){
            $users = User::role('superadmin')->paginate(10);
        }else{
            $users = User::latest()->paginate(10);
        }
    }

    public function render()
    {
        // dapatkan user yang memiliki role guru (kondisi untuk admin)
        if(auth()->user()->hasRole('admin')){
            $users = User::where('sekolah_id', auth()->user()->sekolah_id)->paginate(10);
        }
        else{
            $users = User::latest()->paginate(10);
        }

        // ambil semua data roles
        $roles = Role::latest()->paginate(10);

        // kondisi jika ada input search/pencarian
        if($this->search !== null || $this->search_user !== null){
            $roles = Role::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            if(auth()->user()->hasRole('admin')){
                $users = User::where('name', 'like', '%' . $this->search_user . '%')->latest()->paginate(10);
            }else{
                $users = User::where('name', 'like', '%' . $this->search_user . '%')->latest()->paginate(10);
            }
        }
        return view('livewire.role.index-role', compact('roles', 'users'))
            ->extends('layouts.backend')
            ->section('content');
    }

    public function delete($id)
    {
        if($id){
            Role::where('id',$id)->delete();
            session()->flash('delete', 'Delete Sukses');
        }
    }


    public function aktivasi($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();
    }

    public function blokir($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = null;
        $user->save();
    }
}
