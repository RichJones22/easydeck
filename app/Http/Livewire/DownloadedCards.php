<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DownloadedCards extends Component
{
    public $cards = [];

    public $card;

    protected $listeners = ['riches-card-display' => 'render'];


    public function render()
    {
        $this->getAllCards();

        return view('livewire.downloaded-cards');
    }

    /**
     * delete a specific post
     *
     * @param null $id
     */
    public function delete($id = null)
    {

        $card = DB::table('cards')
            ->where('id',$id)
            ->get('file_name');

        if ($card->isNotEmpty()) {
            unlink(storage_path('images').'/'.$card[0]->file_name);

            DB::table('cards')->delete($id);
        }

        $this->emit('delete-riches-card-display', $id);
    }


    protected function getAllCards(): void
    {
        $this->cards = DB::table('cards')
            ->get(['id', 'file_name']);
    }
}
