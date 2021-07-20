<?php

namespace App\Http\Livewire\Rpp;

use App\Models\RPP;
use App\Models\Mapel;
use App\Models\Sekolah;
use Livewire\Component;

class EditRpp extends Component
{
    public $sekolah, $mapel, $nama_pemilik, $rpp_id;
    public $sekolah_id, $mapel_id, $alokasi_waktu, $pendekatan, $strategi, $metode_rpp, $teknik_materi, $teknik_penilaian, $alat, $bentuk, $kompetensi_dasar, $ipk, $tujuan, $materi_rpp, $langkah_rpp;

    // protected $listeners = ['updateRpp' => 'refreshPage'];

    // public function refreshPage()
    // {}

    public function mount($id)
    {
        $data = RPP::findOrFail($id);
        $this->rpp_id = $id;
        $this->sekolah = Sekolah::latest()->get();
        $this->mapel = Mapel::latest()->get();
        $this->nama_pemilik = $data->user->name;

        $this->sekolah_id = $data->sekolah->id;
        $this->mapel_id = $data->mapel->id;
        $this->alokasi_waktu = $data->alokasi_waktu;
        $this->pendekatan = $data->pendekatan;
        $this->strategi = $data->strategi;
        $this->metode_rpp = $data->metode_rpp;
        $this->teknik_materi = $data->teknik_materi;
        $this->teknik_penilaian = $data->teknik_penilaian;
        $this->alat = $data->alat;
        $this->bentuk = $data->bentuk;
        $this->kompetensi_dasar = $data->kompetensi_dasar;
        $this->ipk = $data->ipk;
        $this->tujuan = $data->tujuan;
        $this->materi_rpp = $data->materi_rpp;
        $this->langkah_rpp = $data->langkah_rpp;
    }

    public function render()
    {
        return view('livewire.rpp.edit-rpp')
            ->extends('layouts.backend')
            ->section('content');
    }

    public function updated($data)
    {
        $this->validateOnly($data, [
            'alokasi_waktu' => 'min:3|max:255',
            'pendekatan' => 'min:3|max:255',
            'strategi' => 'min:3|max:255',
            'metode_rpp' => 'min:3|max:255',
            'teknik_materi' => 'min:3|max:255',
            'teknik_penilaian' => 'min:3|max:255',
            'alat' => 'min:3|max:255',
            'bentuk' => 'min:3|max:255',
        ]);
    }

    protected $messages = [
        'min' => 'Karakter tidak boleh kurang dari 3.',
        'max' => 'Karakter tidak boleh lebih dari 255.',
    ];

    public function update()
    {
        dd([$this->kompetensi_dasar, $this->ipk, $this->tujuan, $this->materi_rpp, $this->langkah_rpp]);

        $this->validate([
            'mapel_id' => 'required|integer|exists:mapel,id',
            'sekolah_id' => 'required|integer|exists:sekolah,id',
            'alokasi_waktu' => 'min:3|max:255',
            'pendekatan' => 'min:3|max:255',
            'strategi' => 'min:3|max:255',
            'metode_rpp' => 'min:3|max:255',
            'teknik_materi' => 'min:3|max:255',
            'teknik_penilaian' => 'min:3|max:255',
            'alat' => 'min:3|max:255',
            'bentuk' => 'min:3|max:255',
        ]);

        
        $data = RPP::findOrFail($this->rpp_id);

        $data->update([
            'mapel_id' => $this->mapel_id,
            'sekolah_id' => $this->sekolah_id,
            'alokasi_waktu' => $this->alokasi_waktu,
            'pendekatan' => $this->pendekatan,
            'strategi' => $this->strategi,
            'metode_rpp' => $this->metode_rpp,
            'teknik_materi' => $this->teknik_materi,
            'teknik_penilaian' => $this->teknik_penilaian,
            'alat' => $this->alat,
            'bentuk' => $this->bentuk,
            'kompetensi_dasar' => $this->kompetensi_dasar,
            'ipk' => $this->ipk,
            'tujuan' => $this->tujuan,
            'materi_rpp' => $this->materi_rpp,
            'langkah_rpp' => $this->langkah_rpp
        ]);

        session()->flash('message', 'Data RPP berhasil diperbarui.');
    }
}
