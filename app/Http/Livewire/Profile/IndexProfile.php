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
    }

    public function render()
    {
        return view('livewire.profile.index-profile')
            ->extends('layouts.setting-profile')
            ->section('content');
    }
}
