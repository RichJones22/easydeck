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
                     ,{{asset($currentCard . ' 320w')}}"
            >
        </div>

        <div class="flex place-content-center">
            <button wire:click="decrement" class="bg-gray-200">
                <x-heroicon-s-chevron-left class="w-8 h-8"/>
            </button>
            <button wire:click="increment" class="bg-gray-200">
                <x-heroicon-s-chevron-right class="w-8 h-8"/>
            </button>
        </div>
    @endif


</div>
