<?php

namespace App\Http\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;

class CreateMapel extends Component
{
    public $hasError;
    public $nama_mapel, $kelas, $semester, $tahun;

    // fungsi untuk validasi realtime
    public function updated($data)
    {
        $this->validateOnly($data, [
            'nama_mapel' => 'min:3|max:255',
            'tahun' => 'min:4',
        ]);

    }

    // merubah message dari error
    protected $messages = [
        'nama_mapel.min' => 'Nama mapel tidak boleh kurang dari 3 karakter.',
        'nama_mapel.max' => 'Nama mapel tidak boleh lebih dari 255 karakter.',
    ];


    // event tambah data mapel
    public function addItem()
    {
        // Validasi Permission (commingsoon)
        
        // VALIDASI DATA
        $this->validate([
            'nama_mapel' => 'required|max:255',
            'kelas' => 'required',
            'semester' => 'required',
            'tahun' => 'required|min:4',
        ]);

        // Create data simpan ke database sekolah
        $item = Mapel::create([
            'nama_mapel' => $this->nama_mapel,
            'kelas' => $this->kelas,
            'semester' => $this->semester,
            'tahun' => $this->tahun,
            'sekolah_id' => auth()->user()->sekolah_id
        ]);

        // hapus form input model setelah proses menyimpan
        $this->nama_mapel = '';
        $this->tahun = '';

        // trigger
        $this->emitUp('mapelAdded');
    }

    public function render()
    {
        return view('livewire.mapel.create-mapel');
    }
}
