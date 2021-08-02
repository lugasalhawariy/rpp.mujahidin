<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Sekolah;
use Livewire\Component;

class IndexProfile extends Component
{
    public $user_id, $name, $username, $password, $email;
    public $user, $showName = false;
    public function mount()
    {
        $this->user = User::findOrFail(auth()->user()->id);
        if(!$this->user){
            abort(404);
        }
    }

    public function edit()
    {
        $this->user_id = auth()->user()->id;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        $sekolah = Sekolah::latest()->get();
        return view('livewire.profile.index-profile', compact('sekolah'))
            ->section('content');
    }

    public function updateUser()
    {

    }
}
