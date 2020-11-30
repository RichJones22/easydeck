<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RichesCardDisplay extends Component
{
    public $currentCard = null;

    public $currentCardPos = 0;

    protected $cards = [];

    protected $firstCardPos = 0;

    protected $lastCardPos = 0;

    /**
     * RichesCardDisplay constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->getAllCardsForDeck();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.riches-card-display');
    }

    /**
     * go to next card
     */
    public function increment() {
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
     */
    protected function getAllCardsForDeck()
    {
        // later this will be a DB call; stubbed for now...
        $this->cards = [
            "img/alpha_SVG/001.svg",
            "img/alpha_SVG/002.svg",
            "img/alpha_SVG/003.svg"
        ];

        // get first card position
        if (! $this->cards[0]) {
            $this->firstCardPos = 0;
        }

        // get last card position
        $this->lastCardPos = count($this->cards) -1;

        // set currentCardPos to the first card
        $this->currentCardPos = 0;

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
