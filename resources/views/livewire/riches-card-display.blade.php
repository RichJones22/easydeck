<div>

    {{-- if no posts let the user know... --}}
    @if(empty($currentCard))
        <div class="text-center">
            be the first to enter a new card...
        </div>
    @else
        <div class="place-content-center">
            <div class="flex place-content-center">
                <img alt="ace of spades card is missing..." src="{{ asset($currentCard) }} "
                     srcset="{{asset($currentCard . ' 860w')}}
                         ,{{asset($currentCard . ' 640w')}}
                         ,{{asset($currentCard . ' 420w')}}
                         ,{{asset($currentCard . ' 320w')}}"
                >
            </div>

            <div class="flex place-content-center">
                <button wire:click="decrement">
                    <x-heroicon-o-chevron-left class="w-8 h-8"/>
                </button>
                <button wire:click="increment">
                    <x-heroicon-o-chevron-right class="w-8 h-8"/>
                </button>
            </div>
        </div>
    @endif


</div>
