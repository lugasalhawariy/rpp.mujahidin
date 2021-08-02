<?php

namespace App\Http\Livewire\Component;

use App\Models\User;
use App\Models\Sekolah;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;

class Navbar extends Component
{
    // public $listener = ['updateSession' => 'refreshPage'];
    public 
        $user_id, 
        $name, 
        $email,
        $username, 
        $sekolah_id,
        $no_telp,
        $tgl_lahir,
        $nbm_guru,
        $nip_guru,
        $alamat,
        $riwayat_pendidikan;
    
    // public function refreshPage()

    public function render()
    {
        $sekolah = Sekolah::latest()->get();
        return view('livewire.component.navbar', compact('sekolah'));
    }
    
    public function editProfile()
    {
        $this->user_id = auth()->user()->id;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
        $this->sekolah_id = auth()->user()->sekolah_id;
        $this->no_telp = auth()->user()->no_telp;
        $this->tgl_lahir = auth()->user()->tgl_lahir;
        $this->nbm_guru = auth()->user()->nbm_guru;
        $this->nip_guru = auth()->user()->nip_guru;
        $this->alamat = auth()->user()->alamat;
        $this->riwayat_pendidikan = auth()->user()->riwayat_pendidikan;
    }

    public function update()
    {
        $data = User::findOrFail($this->user_id);
        $data->update([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'sekolah_id' => $this->sekolah_id,
            'no_telp' => $this->no_telp,
            'tgl_lahir' => $this->tgl_lahir,
            'nbm_guru' => $this->nbm_guru,
            'nip_guru' => $this->nip_guru,
            'alamat' => $this->alamat,
            'riwayat_pendidikan' => $this->riwayat_pendidikan,
        ]);

        $this->emit('updateProfile');
        session()->flash('message', 'Profile diperbaharui.');
    }
}
