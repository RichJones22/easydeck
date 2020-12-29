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

    public string $fileNameTitle = "";

    public string $fileNameDescription = "";

    protected $listeners = [
        'riches-card-display' => 'render',
    ];


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
        $this->emit('delete-riches-card-display', $id);
        $this->emit('add-card-file-names-back', $this->cards);
    }

    public function editCard($id)
    {
        $collection = DB::table('cards')
            ->get()
            ->where('id', '=', $id);

        // none 0 length file_name
        if (strlen($this->fileName)) {

            // is there a change
            if ($this->fileName !== $collection->first()->file_name) {

                // last 4 chars of file_name must be .svg
                if (strtolower(substr($this->fileName, (strlen($this->fileName) - 4), 4)) === '.svg') {
                    $count = DB::table('cards')
                        ->get()
                        ->where('file_name', '=', $this->fileName)
                        ->count();

                    // can't rename a file to and existing file_name
                    if (!$count) {
                        rename($collection->first()->file_location.'/'.$collection->first()->file_name
                            ,$collection->first()->file_location.'/'.$this->fileName);

                        DB::table('cards')
                            ->where('id', '=', $id)
                            ->update([
                                'file_name' => $this->fileName,
                            ]);
                    }
                }
            }
        }

        if (strlen($this->fileNameTitle)) {

            if (ctype_space($this->fileNameTitle)) {
                $this->fileNameTitle = "";
            }

            if ($this->fileNameTitle !== $collection->first()->title) {
                DB::table('cards')
                    ->where('id', '=', $id)
                    ->update([
                        'title' => $this->fileNameTitle,
                    ]);
            }
        }

        if (strlen($this->fileNameDescription)) {

            if (ctype_space($this->fileNameDescription)) {
                $this->fileNameDescription = "";
            }

            if ($this->fileNameDescription !== $collection->first()->description) {
                DB::table('cards')
                    ->where('id', '=', $id)
                    ->update([
                        'description' => $this->fileNameDescription,
                    ]);
            }
        }

        $this->getAllCards();
        $this->emit('add-card-file-names-back', $this->cards);
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
