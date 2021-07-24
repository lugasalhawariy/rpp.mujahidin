<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.role.create-role');
    }

    public function updated($data)
    {
        $this->validateOnly($data, [
            'name' => 'min:3|max:50|regex:/^[a-z]+$/|unique:roles,name'
        ]);
    }

    protected $messages = [
        'name.regex' => 'Isi nama role hanya dengan huruf kecil a-z tanpa spasi',
        'name.unique' => 'Nama role sudah ada, mohon buat dengan nama yang berbeda'
    ];

    public function addItem()
    {
        $this->validate([
            'name' => 'required|min:3|max:50|regex:/^[a-z]+$/|unique:roles,name'
        ]);
        Role::create([
            'name' => $this->name
        ]);

        // trigger ke index role
        $this->emitUp('roleAdded');
    }
}
