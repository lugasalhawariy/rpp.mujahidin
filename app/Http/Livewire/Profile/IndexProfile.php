<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class IndexProfile extends Component
{
    public $user, $showName = false;
    public function mount()
    {
        $this->user = User::findOrFail(auth()->user()->id);
        if(!$this->user){
            abort(404);
        }
    }

    public function render()
    {
        $user = $this->user;
        return view('livewire.profile.index-profile', compact('user'))
            ->section('content');
    }

    public function updateUser()
    {
        
    }
}
