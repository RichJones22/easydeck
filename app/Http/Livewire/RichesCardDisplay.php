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
     * listen for client side events and then call respective methods...
     *
     * @var string[]
     */
    protected $listeners = ['riches-card-display' => 'getAllCardsForDeck'];

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
    public function getAllCardsForDeck()
    {
//        // later this will be a DB call; storing on file system for now.
        $dir = storage_path('images');

        $this->cards = scandir($dir);

        $this->cards = array_filter(scandir($dir), function($item) {
            return $item[0] !== '.';
        });

        foreach ($this->cards as &$value) {
            $value = 'img/alpha_SVG/' . $value;
        }
        unset($value);

        $this->cards = array_values($this->cards);

        if (empty($this->cards)) {
            return;
        }

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
