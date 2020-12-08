<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DzCardFileUpload extends Component
{
    protected $listeners = ['dz-card-file-upload' => 'render'];

    public function render()
    {
        return view('livewire.dz-card-file-upload');
    }
}
