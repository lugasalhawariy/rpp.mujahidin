<?php

namespace App\Http\Livewire\Test;

use App\Models\RPP;
use App\Models\User;
use App\Models\Mapel;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function render()
    {
        if(!auth()->user()->hasAnyRole(Role::all())){
            $data_guru = 'Masih Kosongan';
        }else{
            // jika ada role guru maka logika akan diproses
            if(Role::where('name', 'guru')){
                $data_guru = User::role('guru')->count();
            }else{
                $data_guru = 'Role belum ada';
            }
        }
        
        $data_mapel = Mapel::count();
        $data_rpp = RPP::count();
        return view('livewire.test.index', compact('data_guru', 'data_mapel', 'data_rpp'))
            ->extends('layouts.backend')
            ->section('content');
    }
}
