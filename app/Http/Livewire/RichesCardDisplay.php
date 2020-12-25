<?php

namespace App\Http\Livewire;

use App\Http\Controllers\FileUpload;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RichesCardDisplay extends Component
{
    public array $cards = [];

    public string $currentCard = "";

    public int $firstCardPos = 0;

    public int $lastCardPos = 0;

    public int $currentCardPos = 0;

    /**
     * listen for client side events and then call respective methods...
     *
     * @var string[]
     */
    protected $listeners = [
        'riches-card-display' => 'render',
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

    /**
     * after a card is deleted, determine the current card position.
     *
     * @param $id
     */
    public function cardDeleted($id)
    {
        $this->getAllCards(function() use($id) {

            // deleting towards the beginning of the cards array
            if ($id < $this->currentCardPos) {
                return;
            }
            else
            // deleting towards the ending of the cards array
            if ($id > $this->currentCardPos) {
                return;
            }
            else
            // deleting first card
            if ($id < $this->firstCardPos) {
                $this->currentCardPos = $this->getNextCardsId($id);
            }
            else
            // delete last card
            if ($id > $this->lastCardPos) {
                if ($this->currentCardPos <> $this->firstCardPos) {
                    $this->currentCardPos = $this->getPreviousCardsId($id);
                }
            }
            else
            // deleting a selected card
            if ($id == $this->currentCardPos) {
                // the selected card is a middle card
                if ($this->firstCardPos <> $this->lastCardPos) {
                    $this->currentCardPos = $this->getPreviousCardsId($id);
                }
            }
        });
    }

    /**
     * go to next card
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
        $collection = DB::table('cards')
            ->get(['id','file_location','file_name']);

        // early exit, if there are no cards.
        if ($collection->isEmpty()) {
            $this->currentCard = "";
            return;
        }

        // init cards array
        $this->cards = [];

        // populate the $this->cards array
        $collection->each(function ($card) {
            $this->cards[$card->id] = FileUpload::SUB_DIR.'/'.$card->file_name;
        });

        // set firstCardPos
        $this->firstCardPos = $collection->first()->id;

        // set lastCardPos
        $this->lastCardPos = $collection->last()->id;

        // set currentCardPos
        if ($this->currentCardPos === 0) {
            $this->currentCardPos = $this->firstCardPos;
        }

        // override currentCardPos if $setCurrentPos is not null
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
     * get next card id
     *
     * @return int
     */
    protected function getNextCardsId($id): int
    {
        $collection = DB::table('cards')
            ->get(['id', 'file_name'])->where('id', '>', $id)->first();

        return $collection->id;
    }

    /**
     * get previous card id
     *
     * @return int
     */
    protected function getPreviousCardsId($id): int
    {
        $collection = DB::table('cards')
            ->get(['id', 'file_name'])->where('id', '<', $id)->last();

        return $collection->id;
    }

}
