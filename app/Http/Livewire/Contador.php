<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contador extends Component
{
    public $contador = 10;

    public function render()
    {
        return view('livewire.contador')->layout('layouts.guest');
    }

    public function incrementar()
    {
        $this->contador++;
    }
}
