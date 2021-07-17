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
            'nss' => 'min:20|max:20',
            'npsn' => 'min:20|min:20',
            'alamat' => 'min:5|max:255',
            'desa' => 'min:5|max:50',
            'kecamatan' => 'min:5|max:50',
            'kabupaten' => 'min:5|max:50',
            'nama_kepsek' => 'min:5|max:255',
            'nbm' => 'min:10|max:10',
        ]);
    }

    // merubah message dari error
    protected $messages = [
        'nama_sekolah.min' => 'Nama sekolah tidak boleh kurang dari 3 karakter.',
        'nama_sekolah.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter.',
        'nss.min' => 'NSS harus 20 karakter.',
        'nss.max' => 'NSS harus 20 karakter.',
        'npsn.min' => 'NPSN harus 20 karakter.',
        'npsn.max' => 'NPSN harus 20 karakter.',
        'nbm.min' => 'NBM harus 10 karakter.',
        'nbm.max' => 'NBM harus 10 karakter.',
    ];


    // event tambah data sekolah
    public function addItem()
    {
        // VALIDASI DATA
        $this->validate([
            'nama_sekolah' => 'required|max:255',
            'nss' => 'required|min:20|max:20',
            'npsn' => 'required|max:20|min:20',
            'alamat' => 'required|min:5|max:255',
            'desa' => 'required|min:3|max:50',
            'kecamatan' => 'required|min:3|max:50',
            'nama_kepsek' => 'required|min:3|max:50',
            'kabupaten' => 'required|min:3|max:50',
            'status_sekolah' => 'required',
            'nbm' => 'required|min:10|max:10',

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
