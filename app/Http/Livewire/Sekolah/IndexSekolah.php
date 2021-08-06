<?php

namespace App\Http\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;
use App\Models\Notification;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class IndexSekolah extends Component
{
    use WithPagination;
    public $show = false;
    public $search;
    public $updateMode = false;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];
    protected $listeners = ['sekolahAdded' => 'refreshPage', 'updateProfile' => 'refreshPage'];

    public $nama_sekolah, $sekolah_id, $nss, $npsn, $alamat, $desa, $kecamatan, $kabupaten, $nama_kepsek, $status_sekolah, $nbm, $akreditasi;

    public function refreshPage()
    {
        session()->flash('message', 'Successfully created');
        $this->sekolah = Sekolah::latest()->get();
    }
    
    public function render()
    {
        $sekolah = Sekolah::latest()->paginate(5);
        if($this->search !== null){
            $sekolah = Sekolah::where('nama_sekolah', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        }
        return view('livewire.sekolah.index-sekolah', compact('sekolah'))
            ->extends('layouts.backend')
            ->section('content');
    }

    public function edit($id)
    {
        if(auth()->user()->sekolah_id !== $id){
            abort(403);
        }
        $this->updateMode = true;
        $sekolah = Sekolah::where('id',$id)->first();
        $this->sekolah_id = $id;
        $this->nama_sekolah = $sekolah->nama_sekolah;
        $this->nss = $sekolah->nss;
        $this->npsn = $sekolah->npsn;
        $this->alamat = $sekolah->alamat;
        $this->desa = $sekolah->desa;
        $this->kecamatan = $sekolah->kecamatan;
        $this->kabupaten = $sekolah->kabupaten;
        $this->nama_kepsek = $sekolah->nama_kepsek;
        $this->nbm = $sekolah->nbm;
        $this->akreditasi = $sekolah->akreditasi;
        $this->status_sekolah = $sekolah->status_sekolah;
    }

    public function delete($id)
    {
        if($id){
            $sekolah = Sekolah::findOrFail($id);
            session()->flash('message', 'Data sekolah berhasil dihapus.');
            // cari id superadmin. (login buat pesan admin tertentu telah menghapus data sekolah)
            $superadmin = Role::where('name', 'superadmin')->first();
            Notification::create([
                'title' => 'hapus data sekolah',
                'body' => 'Saya telah menghapus data sekolah '. $sekolah->nama_sekolah,
                'user_id' => auth()->user()->id,
                'role_id' => $superadmin->id,
                'expired' => now()->addDays(7)
            ]);
            $sekolah->delete();
        }
    }

    public function update()
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

        if ($this->sekolah_id) {
            $sekolah = Sekolah::find($this->sekolah_id);
            $sekolah->update([
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

            $this->updateMode = false;
            session()->flash('message', 'Data '. $this->nama_sekolah. ' berhasil diperbarui.');
        }
    }

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
        'nss.min' => 'NSS harus 20 karakter.',
        'nss.max' => 'NSS harus 20 karakter.',
        'npsn.min' => 'NPSN harus 20 karakter.',
        'npsn.max' => 'NPSN harus 20 karakter.',
        'nbm.min' => 'NBM harus 10 karakter.',
        'nbm.max' => 'NBM harus 10 karakter.',
    ];
}
