<?php

namespace App\Http\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;
use Livewire\WithPagination;


class IndexMapel extends Component
{
    use WithPagination;
    public $show = false;
    public $search;
    public $updateMode = false;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];
    protected $listeners = ['mapelAdded' => 'refreshPage', 'updateProfile' => 'refreshPage'];

    public $mapel_id, $nama_mapel, $kelas, $semester, $tahun;
    public function refreshPage()
    {
        session()->flash('message', 'Successfully created');
        $this->mapel = Mapel::latest()->get();
    }
    
    public function render()
    {
        if(auth()->user()->sekolah_id == null){
            abort(403);
        }
        $mapel = Mapel::latest()->paginate(10);
        if($this->search !== null){
            $mapel = Mapel::where('nama_mapel', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        }
        return view('livewire.mapel.index-mapel', compact('mapel'))
            ->extends('layouts.backend')
            ->section('content');
    }

    public function edit($id)
    {
        // Validasi Permission (commingsoon)
        $this->updateMode = true;
        $mapel = Mapel::where('id',$id)->first();
        $this->mapel_id = $id;
        $this->nama_mapel = $mapel->nama_mapel;
        $this->kelas = $mapel->kelas;
        $this->semester = $mapel->semester;
        $this->tahun = $mapel->tahun;
    }

    public function delete($id)
    {
        // Validasi Permission (commingsoon)

        if($id){
            Mapel::where('id',$id)->delete();
            session()->flash('message', 'Data mapel berhasil dihapus.');
        }
    }

    public function update()
    {
        // Validasi Permission (commingsoon)

        // VALIDASI DATA
        $this->validate([
            'nama_mapel' => 'max:255',
            'kelas' => 'max:3',
            'tahun' => 'required|min:4',
        ]);

        if ($this->mapel_id) {
            $mapel = Mapel::find($this->mapel_id);
            $mapel->update([
                'nama_mapel' => $this->nama_mapel,
                'kelas' => $this->kelas,
                'semester' => $this->semester,
                'tahun' => $this->tahun,
            ]);

            $this->updateMode = false;
            session()->flash('message', 'Data '. $this->nama_mapel. ' berhasil diperbarui.');
        }
    }

    // fungsi untuk validasi realtime
    public function updated($data)
    {
        $this->validateOnly($data, [
            'nama_mapel' => 'min:3|max:255',
        ]);

    }

    // merubah message dari error
    protected $messages = [
        'nama_mapel.min' => 'Nama mapel tidak boleh kurang dari 3 karakter.',
        'nama_mapel.max' => 'Nama mapel tidak boleh lebih dari 255 karakter.',
    ];
}
