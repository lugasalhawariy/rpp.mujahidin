<?php

namespace App\Http\Livewire\Rpp;

use App\Models\RPP;
use Livewire\Component;

class Trash extends Component
{
    protected $listeners = ['updateProfile' => 'refreshPage'];

    public function refreshPage(){}

    public function render()
    {
        $rpp = RPP::onlyTrashed()->where('user_id', auth()->user()->id)->get();

        return view('livewire.rpp.trash', compact('rpp'))
            ->extends('layouts.backend')
            ->section('content');
    }

    public function delete($id)
    {
        $rpp = RPP::onlyTrashed()->where('id', $id);
        $rpp->forceDelete();
        session()->flash('delete', 'Data berhasil dihapus permanen...');
    }

    public function restore($id)
    {
        $rpp = RPP::onlyTrashed()->where('id', $id);
        $rpp->restore();
        session()->flash('message', 'Data sudah dikembalikan...');
    }
}
