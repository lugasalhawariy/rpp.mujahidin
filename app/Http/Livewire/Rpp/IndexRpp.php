<?php

namespace App\Http\Livewire\Rpp;
use App\Models\RPP;

use App\Models\User;
use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class IndexRpp extends Component
{
    use WithPagination;
    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $mapel_id, $sekolah_id;

    public function render()
    {
        $rpp = RPP::latest()->paginate(5);
        if($this->search !== null){
            $rpp = RPP::where('status', 'like', '%'.$this->search.'%')->latest()->paginate(5);
        }else{
            $rpp = RPP::latest()->paginate(5);
        }
        return view('livewire.rpp.index-rpp', compact('rpp'))
            ->extends('layouts.backend')
            ->section('content');
    } 

    public function delete($id)
    {
        if($id){
            RPP::where('id',$id)->delete();
            session()->flash('delete', 'Data RPP berhasil dihapus.');
        }
    }
}
