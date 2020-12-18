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
        'display-card' => 'displayCard',
        'delete-riches-card-display' => 'cardDeleted',
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->getAllCards();
    }

    public function render()
    {
        return view('livewire.riches-card-display');
    }

    public function displayCard($id)
    {
        $this->currentCardPos = $id;

        $this->setCurrentCard();
    }

    /**
     * @param $id
     */
    public function cardDeleted($id)
    {
        $this->getAllCards(function() use($id) {

            // we deleted the first card
            if ($id < $this->firstCardPos) {
                $this->currentCardPos = $this->getNextCardsId($id);
            }
            else
            // we deleted the last card
            if ($id > $this->lastCardPos) {
                $this->currentCardPos = $this->getPreviousCardsId($id);
            }
            else
            // we deleted the current card
            if ($id == $this->currentCardPos) {
                // the first and last card are not the same...
                if ($this->firstCardPos <> $this->lastCardPos) {
                    $this->currentCardPos = $this->getPreviousCardsId($id);
                }
            }

        });
    }

    /**
     *
     */
    public function increment()
    {
        if ($this->currentCardPos < $this->lastCardPos) {
            $this->currentCardPos = $this->getNextCardsId($this->currentCardPos);

            $this->setCurrentCard();
        }
    }

    /**
     * go to previous card
     */
    public function decrement() {
        if ($this->currentCardPos > $this->firstCardPos) {
            $this->currentCardPos = $this->getPreviousCardsId($this->currentCardPos);

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
            $this->cards[$card->id] = 'img/alpha_SVG/'.$card->file_name;
        });

        // set firstCardPos and currentCardPos to 0
        $this->firstCardPos = $collection->first()->id;

        // get last card position
        $this->lastCardPos = $collection->last()->id;

        // set currentCardPos
        if ($this->currentCardPos === 0) {
            $this->currentCardPos = $this->firstCardPos;
        }
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

    /**
     * @return int
     */
    protected function getNextCardsId($id): int
    {
        $collection = DB::table('cards')
            ->get(['id', 'file_name'])->where('id', '>', $id)->first();

        return $collection->id;
    }

    /**
     * @return int
     */
    protected function getPreviousCardsId($id): int
    {
        $collection = DB::table('cards')
            ->get(['id', 'file_name'])->where('id', '<', $id)->last();

        return $collection->id;
    }

}
