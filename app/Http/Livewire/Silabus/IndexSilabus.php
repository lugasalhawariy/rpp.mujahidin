<?php

namespace App\Http\Livewire\Silabus;

use App\Models\Silabus;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class IndexSilabus extends Component
{
    use WithFileUploads;

    public $file;
    protected $listeners = ['upload' => 'refresh', 'delete' => 'refreshDelete'];

    public function refresh()
    {
        session()->flash('message', 'File berhasil diupload');
    }

    public function refreshDelete()
    {
        session()->flash('message', 'File berhasil dihapus');
    }

    public function download($id)
    {
        $file = Silabus::findOrFail($id);
        $data = $file->file;

        // jika file tidak ada maka mengeluarkan page 404
        if(Storage::disk('public')->exists($data)){
            return Storage::disk('public')->download($data);
        }else{
            abort(404);
        }
    }

    public function delete($id)
    {
        $file = Silabus::findOrFail($id);
        if($file->user_id !== auth()->user()->id){
            abort(403);
        }
        // $file->delete();
        $data = $file->file;

        if(Storage::disk('public')->exists($data)){
            Storage::disk('public')->delete($data);
            $file->delete();
            $this->emit('delete');
        }else{
            $file->delete();
            $this->emit('delete');
        }   
    }

    public function addItem()
    {
        $data = $this->validate([
            'file' => 'required|mimes:pdf,docx'
        ]);

        // arahkan filename ke directory
        $filename = $this->file->store('files', 'public');

        $data['user_id'] = auth()->user()->id;
        $data['file'] = $filename;

        Silabus::create($data);
        $this->emitSelf('upload');
    }

    public function render()
    {
        $silabus = Silabus::latest()->paginate(5);
        return view('livewire.silabus.index-silabus', compact('silabus'))
            ->extends('layouts.backend')
            ->section('content');
    }
}
