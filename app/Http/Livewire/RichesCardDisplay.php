<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RichesCardDisplay extends Component
{
    public $currentCard = null;

    public $currentCardPos = 0;

    public $cards = [];

    public $firstCardPos = 0;

    public $lastCardPos = 0;

    /**
     * listen for client side events and then call respective methods...
     *
     * @var string[]
     */
    protected $listeners = [
        'riches-card-display' => 'render',
        'delete-riches-card-display' => 'cardDeleted'
    ];

    public function render()
    {
        $this->getAllCards();

        return view('livewire.riches-card-display');
    }

    /**
     * used to set the currentCardPos on a delete.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cardDeleted()
    {
        // I need to replace the below array values with id's from the
        // model.  I can then get the id from passed into this method
        // to compare if the card being deleted is less than currentCardPos.
        // then the below code will work, once I uncomment the below else
        // statement.
        $this->getAllCards(function() {
            if ($this->currentCardPos > $this->lastCardPos) {
                $this->currentCardPos = $this->currentCardPos -1;
            }
//            else
//            if ($this->currentCardPos !== $this->firstCardPos){
//                $this->currentCardPos = $this->currentCardPos -1;
//            }
        });

        return view('livewire.riches-card-display');
    }

    /**
     * go to next card
     */
    public function increment()
    {
        if ($this->currentCardPos < $this->lastCardPos) {
            $this->currentCardPos++;

            $this->setCurrentCard();
        }
    }

    /**
     * go to previous card
     */
    public function decrement() {
        if ($this->currentCardPos > $this->firstCardPos) {
            $this->currentCardPos--;

            $this->setCurrentCard();
        }
    }

    /**
     * get all cards
     *
     * @param $setCurrentPos
     */
    public function getAllCards($setCurrentPos = null)
    {
        // get cards from db; db returns a Collection type.
        /** @var \Illuminate\Support\Collection $collection */
        $collection = DB::table('cards')
            ->get(['id','file_name']);

        // early exit, if there are no cards.
        if ($collection->isEmpty()) {
            $this->currentCard = null;
            return;
        }

        // init cards array
        $this->cards = [];

        // populate the $this->cards array
        $collection->each(function ($card) {
            $this->cards[] = 'img/alpha_SVG/'.$card->file_name;
        });

        // set firstCardPos and currentCardPos to 0
        $this->firstCardPos = 0;

        // get last card position
        $this->lastCardPos = $collection->count() -1;

        // set currentCardPos
        if ($setCurrentPos !== null) {
            $setCurrentPos();
        }

        // set the '$currentCard' value
        $this->setCurrentCard();
    }

    /**
     * set current card
     */
    protected function setCurrentCard(): void
    {
        $this->currentCard = $this->cards[$this->currentCardPos];
    }
}
