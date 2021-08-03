<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Notification;
use Spatie\Permission\Models\Role;

class IndexNotification extends Component
{
    public $show = false;
    public $title, $role_id, $body, $expired;

    public $listeners = ['notificationAdd' => 'refresh'];

    public function refresh()
    {
        $title = '';
        $role_id = '';
        $body = '';
        $expired = '';
        session()->flash('message', 'Successfully created');
    }

    public function render()
    {
        $data = Notification::where('role_id', auth()->user()->roles->pluck('id'))
                                ->orWhere('user_id', auth()->user()->id)->latest()->paginate(5);
        $roles = Role::latest()->get();
        return view('livewire.notification.index-notification', compact('data', 'roles'))
            ->extends('layouts.backend')
            ->section('content');
    }

    public function updated($data)
    {
        $this->validateOnly($data, [
            'title' => 'min:3',
            'expired' => 'date',
            'role_id' => 'exists:roles,id',
            'body' => 'min:5|max:255'
        ]);
    }

    public function addItem()
    {
        $this->validate([
            'title' => 'required|min:3',
            'expired' => 'required|date',
            'role_id' => 'required|exists:roles,id',
            'body' => 'required|min:5|max:255'
        ]);

        $data = Notification::create([
            'title' => $this->title,
            'expired' => $this->expired,
            'user_id' => auth()->user()->id,
            'role_id' => $this->role_id,
            'body' => $this->body
        ]);

        $this->emit('notificationAdd');
    }

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

    
}
