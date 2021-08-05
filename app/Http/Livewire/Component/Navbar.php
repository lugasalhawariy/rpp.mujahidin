<?php

namespace App\Http\Livewire\Component;

use App\Models\User;
use App\Models\Sekolah;
use Livewire\Component;
use App\Models\Notification;
use Spatie\Permission\Models\Role;

class Navbar extends Component
{
    public $listeners = ['notificationAdd' => 'refresh', 'updateProfile' => 'refresh'];

    public function refresh(){}

    public function mount()
    {
        $notif = Notification::latest()->get();
        foreach ($notif as $item) {
            // jika tgl expired lebih kecil dari sekarang (terlewati)
            if($item->expired < now()){
                $data = Notification::findOrFail($item->id);
                $data->delete();
            }
        }
    }
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
        $role_all = Role::all();
        if(!auth()->user()->hasAnyRole($role_all)){
            $jumlah_pesan = 0;
            $pesan = 0;
        }else{
            $jumlah_pesan = Notification::where('role_id', auth()->user()->roles->pluck('id'))->count();
            $pesan = Notification::where('role_id', auth()->user()->roles->pluck('id'))->latest()->paginate(5);
        }
        
        $sekolah = Sekolah::latest()->get();
        return view('livewire.component.navbar', compact('sekolah', 'jumlah_pesan', 'pesan', 'role_all'));
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
