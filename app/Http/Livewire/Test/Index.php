<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.test.index')
            ->extends('layouts.backend')
            ->section('content');
    }
}
