<?php

namespace App\Http\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;

class CreateSekolah extends Component
{
    public $hasError;
    public $nama_sekolah, $nss, $npsn, $alamat, $desa, $kecamatan, $kabupaten, $status_sekolah, $akreditasi, $nama_kepsek, $nbm;

    // fungsi untuk validasi realtime
    public function updated($data)
    {
        $this->validateOnly($data, [
            'nama_sekolah' => 'min:3|max:255',
            'nss' => 'min:8|max:20',
            'npsn' => 'min:8|max:20',
            'alamat' => 'min:5|max:255',
            'desa' => 'min:5|max:50',
            'kecamatan' => 'min:5|max:50',
            'kabupaten' => 'min:5|max:50',
            'nama_kepsek' => 'min:5|max:255',
            'nbm' => 'min:7|max:10',
        ]);
    }

    // merubah message dari error
    protected $messages = [
        'nama_sekolah.min' => 'Nama sekolah tidak boleh kurang dari 3 karakter.',
        'nama_sekolah.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter.',
        'nss.min' => 'NSS tidak boleh kurang dari 8 karakter.',
        'nss.max' => 'NSS tidak boleh lebih dari 20 karakter.',
        'npsn.min' => 'NPSN tidak boleh kurang dari 8 karakter.',
        'npsn.max' => 'NPSN tidak boleh lebih dari 20 karakter.',
        'nbm.min' => 'NBM tidak boleh kurang dari 7 karakter.',
        'nbm.max' => 'NBM tidak boleh lebih dari 10 karakter.',
    ];


    // event tambah data sekolah
    public function addItem()
    {
        // VALIDASI DATA
        $this->validate([
            'nama_sekolah' => 'required|max:255',
            'nss' => 'required|min:8|max:10',
            'npsn' => 'required|min:8|max:10',
            'alamat' => 'required|min:5|max:255',
            'desa' => 'required|min:3|max:50',
            'kecamatan' => 'required|min:3|max:50',
            'nama_kepsek' => 'required|min:3|max:50',
            'kabupaten' => 'required|min:3|max:50',
            'status_sekolah' => 'required',
            'nbm' => 'required|min:7|max:10',

        ]);

        // Create data simpan ke database sekolah
        $item = Sekolah::create([
            'nama_sekolah' => $this->nama_sekolah,
            'nss' => $this->nss,
            'npsn' => $this->npsn,
            'alamat' => $this->alamat,
            'desa' => $this->desa,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabupaten,
            'status_sekolah' => $this->status_sekolah,
            'akreditasi' => $this->akreditasi,
            'nama_kepsek' => $this->nama_kepsek,
            'nbm' => $this->nbm
        ]);

        // hapus form input model setelah proses menyimpan
        $this->nama_sekolah = '';
        $this->nss = '';
        $this->npsn = '';
        $this->alamat = '';
        $this->desa = '';
        $this->kecamatan = '';
        $this->kabupaten = '';
        $this->status_sekolah = '';
        $this->akreditasi = '';
        $this->nama_kepsek = '';
        $this->nbm = '';

        // trigger
        $this->emitUp('sekolahAdded');
    }

    public function render()
    {
        return view('livewire.sekolah.create-sekolah');
    }
}
