<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Tema;
use Livewire\Component;

class Albumes extends Component
{
    public $albumes;

    public function mount()
    {
        $this->refrescar();
    }

    public function render()
    {
        return view('livewire.albumes')->layout('layouts.guest');
    }

    public function borrar(Album $album)
    {
        Tema::where('album_id', $album->id)->delete();
        $album->delete();
        $this->refrescar();
        return redirect('/');
    }

    private function refrescar()
    {
        $this->albumes = Album::all();
    }
}
