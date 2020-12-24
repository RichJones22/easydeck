<div>
{{--     if no posts let the user know... --}}
    @if($cards->isEmpty())
        <div>download some cards...</div>
    @endif

{{--     display the post, and allow for post deletion --}}
    @if($cards->isNotEmpty())
        <hr>
    @endif

    @foreach($cards as $cardKey)
        <div class="flex justify-between">
            <div class="flex pt-3 pb-3">
                <div wire:click="$emit('display-card','{{ $cardKey->id }}')" class="flex cursor-pointer bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg text-sm border-2 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    <img class="h-8 w-8 rounded-full object-cover" alt="ace of spades card is missing..." src="{{ asset("img/alpha_SVG/".$cardKey->file_name) }}"
                         srcset="{{asset("img/alpha_SVG/".$cardKey->file_name . ' 860w')}}
                             ,{{asset("img/alpha_SVG/".$cardKey->file_name . ' 640w')}}
                             ,{{asset("img/alpha_SVG/".$cardKey->file_name . ' 420w')}}
                             ,{{asset("img/alpha_SVG/".$cardKey->file_name . ' 320w')}}"
                    >
                </div>
{{--                <div class="text-2xl">card is:</div>--}}
                <div class="italic ml-4"> {{ $cardKey->file_name }}</div>
            </div>

            <button id="deleteCard" class="inline-flex rounded-md p-1.5" wire:click="delete('{{ $cardKey->id }}')">
                <x-heroicon-o-trash class="w-6 h-6 text-red-600"/>
            </button>
        </div>
        <hr>
    @endforeach
</div>
