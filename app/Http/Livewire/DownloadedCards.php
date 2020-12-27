<?php

namespace App\Http\Livewire;

use App\Http\Controllers\FileUpload;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DownloadedCards extends Component
{
    public $cards = [];

    public $card;

    public array $listOfCardId = [];

    public int $firstCardId;

    public int $lastCardId;

    public string $fileName = "";

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
            unlink(public_path(FileUpload::SUB_DIR).'/'.$card[0]->file_name);

            DB::table('cards')->delete($id);
        }

        $this->getAllCards();
        $this->emit('delete-riches-card-display', $this->cards);
    }

    public function editCard()
    {
//        dd($this->fileName);

        $this->getAllCards();
        $this->emit('delete-riches-card-display', $this->cards);
    }


    protected function getAllCards(): void
    {
        $this->cards = DB::table('cards')
            ->get(['id', 'file_name', 'title', 'description']);

        if ($this->cards->isEmpty()) {
            $this->listOfCardId = [];

            $this->firstCardId = 0;
            $this->lastCardId = 0;

            return;
        }

        $this->cards->each(function($card) {
            $this->listOfCardId[] = $card->id;
        });

        $this->firstCardId = $this->cards->first()->id;
        $this->lastCardId = $this->cards->last()->id;
    }
}
