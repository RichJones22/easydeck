<div>
{{--     if no posts let the user know... --}}
    @if(($cards->isEmpty()))
        <div>list of cards</div>
    @endif

{{--     display the post, and allow for post deletion --}}
    @foreach($cards as $cardKey)
        <div class="flex justify-between">
            <div class="flex">
                <div class="text-2xl">card is:</div>
                <div class="italic ml-4"> {{ $cardKey->file_name }}</div>
            </div>

            <button id="deleteCard" class="inline-flex rounded-md p-1.5" wire:click="delete('{{ $cardKey->id }}')">
                &times;
            </button>
        </div>
        <hr>
    @endforeach
</div>
