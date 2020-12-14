<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DzCardFileUpload extends Component
{
    protected $listeners = ['dz-card-file-upload' => 'renderRichesSection'];

    public function render()
    {
        return view('livewire.dz-card-file-upload');
    }

    /**
     * Upon file download refresh all the component.  For some reason this
     * works best.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function renderRichesSection()
    {
        return redirect()->route('riches-card');
    }
}
