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
        // jika si user memiliki role superadmin/admin
        if(auth()->user()->hasAnyRole('superadmin|admin')){
            $rpp = RPP::latest()->paginate(5);
            if($this->search !== null){
                // $rpp = RPP::where('status', 'like', '%'.$this->search.'%')->latest()->paginate(5);
                
                // FUNGSI SEARCHING BERDASARKAN NAMA SEKOLAH, NSS, NPSN, NAMA KEPSEK, NAMA MAPEL, TAHUN MAPEL
                $value = $this->search;
                $rpp = RPP::with(['sekolah', 'mapel'])
                            ->whereHas('sekolah', function($q) use($value){
                                $q->where('nama_sekolah', 'like', '%'.$value.'%')
                                    ->orWhere('nss', '=', $value)
                                    ->orWhere('npsn', '=', $value)
                                    ->orWhere('nama_kepsek', 'like', '%'.$value.'%');
                            })
                            ->orWhereHas('mapel', function($q) use($value){
                                $q->where('nama_mapel', 'like', '%'.$value.'%')
                                    ->orWhere('tahun', '=', $value);
                            })
                            ->latest()->paginate(5);
            }else{
                $rpp = RPP::latest()->paginate(5);
            }
        }else{
            $rpp = RPP::where('user_id', auth()->user()->id)->latest()->paginate(5);
            if($this->search !== null){
                // $rpp = RPP::where('status', 'like', '%'.$this->search.'%')->latest()->paginate(5);
                
                // FUNGSI SEARCHING BERDASARKAN NAMA SEKOLAH, NSS, NPSN, NAMA KEPSEK, NAMA MAPEL, TAHUN MAPEL
                $value = $this->search;
                $rpp = RPP::with(['sekolah', 'mapel'])
                            ->whereHas('sekolah', function($q) use($value){
                                $q->where('nama_sekolah', 'like', '%'.$value.'%')->where('user_id', auth()->user()->id)
                                    ->orWhere('nss', '=', $value)->where('user_id', auth()->user()->id)
                                    ->orWhere('npsn', '=', $value)->where('user_id', auth()->user()->id)
                                    ->orWhere('nama_kepsek', 'like', '%'.$value.'%')->where('user_id', auth()->user()->id);
                                    
                            })
                            ->orWhereHas('mapel', function($q) use($value){
                                $q->where('nama_mapel', 'like', '%'.$value.'%')->where('user_id', auth()->user()->id)
                                    ->orWhere('tahun', 'like', '%'.$value)->where('user_id', auth()->user()->id);
                            })
                            ->latest()->paginate(5);
            }else{
                $rpp = RPP::where('user_id', auth()->user()->id)->latest()->paginate(5);
            }
        }
        return view('livewire.rpp.index-rpp', compact('rpp'))
                ->extends('layouts.backend')
                ->section('content');
    } 

    public function delete($id)
    {
        if($id){
            RPP::where('id',$id)->delete();
            session()->flash('message', 'Data RPP berhasil dihapus.');
        }
    }
}
