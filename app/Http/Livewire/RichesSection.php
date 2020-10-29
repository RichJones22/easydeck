<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RichesSection extends Component
{
    public $count=0;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->count = 1;
    }

    public function increment() {
        $this->count++;
    }

    public function decrement() {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.riches-section');
    }
}
