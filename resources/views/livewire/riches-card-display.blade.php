<div>

    {{-- if no posts let the user know... --}}
    @if(empty($currentCard))
        <div class="text-center">
            be the first to enter a new card...
        </div>
    @else
        <div class="flex place-content-center">
            <img alt="ace of spades card is missing..." src="{{ asset($currentCard) }}"
                 srcset="{{asset($currentCard . ' 860w')}}
                     ,{{asset($currentCard . ' 640w')}}
                     ,{{asset($currentCard . ' 420w')}}
                     ,{{asset($currentCard . ' 320w')}}">
        </div>

        <div class="flex items-center mt-2">
            <button wire:click="decrement" class="ml-5 mr-1">[-]</button>
            <button wire:click="increment">[+]</button>
        </div>
    @endif


</div>
