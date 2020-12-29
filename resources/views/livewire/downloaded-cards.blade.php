<div>
{{--     sets all input boxes to a background of while--}}
    <style>
        input[type=text]:disabled {
            background: white;
        }
    </style>

{{--     if no posts let the user know... --}}
    @if($cards->isEmpty())
        <div>download some cards...</div>
    @endif

{{--     display the post, and allow for post deletion --}}
    @if($cards->isNotEmpty())
        <hr>
    @endif

{{--    @foreach($cards as $cardKey)--}}
{{--        <span>{{ $cardKey->id }}</span>--}}
{{--    @endforeach--}}

    @foreach($cards as $cardKey)
        <div class="flex justify-between">
            <span class="pl-13 font-bold hidden" id="fileNameSpan{{ $cardKey->id }}">File Name</span>
            <span class="font-bold hidden" id="fileTitleSpan{{ $cardKey->id }}">Title</span>
            <span class="font-bold hidden" id="fileDescriptionSpan{{ $cardKey->id }}">Description</span>
        </div>
        <div class="flex justify-between">
            <div class="flex pt-3 pb-3">
                <div wire:click="$emit('display-card','{{ $cardKey->id }}')" class="flex cursor-pointer bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg text-sm border-2 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    <img class="h-8 w-8 rounded-full object-cover" alt="ace of spades card is missing..." src="{{ asset("img/alpha_SVG/".$cardKey->file_name) }}"
                         srcset="{{asset("images/".$cardKey->file_name . ' 860w')}}
                             ,{{asset("images/".$cardKey->file_name . ' 640w')}}
                             ,{{asset("images/".$cardKey->file_name . ' 420w')}}
                             ,{{asset("images/".$cardKey->file_name . ' 320w')}}"
                    >
                </div>

                <form>
                    @csrf
                    <label for="fileName">
                        <input wire:model.defer="fileName"
{{--                               value="{{ $cardKey->file_name }}"--}}
                               id="fileName{{ $cardKey->id }}"
                               class="italic ml-4"
                               name="fileName"
                               type="text"
                               disabled>
                    </label>
                    <label for="title">
                        <input wire:model.defer="fileNameTitle"
{{--                               value="{{ $cardKey->title }}"--}}
                               id="title{{ $cardKey->id }}"
                               class="ml-5"
                               name="title"
                               type="text"
                               disabled>
                    </label>
                    <label for="description">
                        <input wire:model.defer="fileNameDescription"
{{--                               value="{{ $cardKey->description }}"--}}
                               id="description{{ $cardKey->id }}"
                               class="ml-5"
                               name="description"
                               type="text"
                               disabled>
                    </label>
                </form>
            </div>

            <div class="pt-3 pb-3">
                <button id="editButtonPencil{{ $cardKey->id }}" class="inline-flex rounded-md"
                        onclick="showCardFields({{ $cardKey->id }}, {{ $cards }})"
                        wire:click="$emit('display-card','{{ $cardKey->id }}')">
                    <x-heroicon-o-pencil id="editCardPencil{{ $cardKey->id }}" class="w-6 h-6 text-gray-600"/>
                </button>
                <button id="editButtonServer{{ $cardKey->id }}" class="inline-flex rounded-md"
                        wire:click="editCard({{ $cardKey->id }})">
                    <x-heroicon-o-server id="editCardServer{{ $cardKey->id }}" class="w-6 h-6 text-blue-600" hidden/>
                </button>
                <button id="deleteCard{{ $cardKey->id }}" class="inline-flex rounded-md p-1.5"
                        wire:click="delete('{{ $cardKey->id }}')">
                    <x-heroicon-o-trash class="w-6 h-6 text-red-600"/>
                </button>
            </div>
        </div>
        <hr>
    @endforeach

    <script>

        // event listener for server side events
        Livewire.on('add-card-file-names-back', cards => {
            displayValues(cards);
        });

        // plain javascript document ready logic...
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }
        docReady(function() {
            setTimeout(function(){
                displayValues();
            }, 1);
        });

        // enable the card column values for a specific cardId
        function showCardFields(cardId, cards) {
            document.getElementById('fileName' + cardId).removeAttribute("disabled");
            document.getElementById('fileName' + cardId).classList.add("border");
            document.getElementById('fileName' + cardId).classList.add("border-blue-500");
            document.getElementById('title' + cardId).removeAttribute("disabled");
            document.getElementById('title' + cardId).classList.add("border");
            document.getElementById('title' + cardId).classList.add("border-blue-500");
            document.getElementById('description' + cardId).removeAttribute("disabled");
            document.getElementById('description' + cardId).classList.add("border");
            document.getElementById('description' + cardId).classList.add("border-blue-500");
            // document.getElementById('fileNameSpan' + cardId).style.display = "flex";
            // document.getElementById('fileTitleSpan' + cardId).style.display = "flex";
            // document.getElementById('fileDescriptionSpan' + cardId).style.display = "flex";
            document.getElementById('editCardPencil' + cardId).style.display = "none";
            document.getElementById('editCardServer' + cardId).style.display = "block";
            document.getElementById('fileName' + cardId).focus();

            disableTheRest(cards);
        }

        // redisplay the value property of the fileName input field.
        // for some reason the 'wire:model.defer="fileName"' causes the
        // value property not to display.
        function displayValues(cards) {
            let listOfCardIds = [];

            if (cards == null) {
                listOfCardIds = @json($cards);
            } else {
                listOfCardIds = cards;
            }

            for (let i = 0; i < listOfCardIds.length; i++) {
                document.getElementById('fileName'+listOfCardIds[i].id).value = listOfCardIds[i].file_name;
                document.getElementById('title'+listOfCardIds[i].id).value = listOfCardIds[i].title;
                document.getElementById('description'+listOfCardIds[i].id).value = listOfCardIds[i].description;
            }
        }

        // disable all the other edit and delete button on the page.
        function disableTheRest(cards) {
            let listOfCardIds = [] = cards;

            for (let i = 0; i < listOfCardIds.length; i++) {
                document.getElementById('editButtonPencil'+listOfCardIds[i].id).setAttribute("disabled", "true");
                document.getElementById('deleteCard'+listOfCardIds[i].id).setAttribute("disabled", "true");
            }
        }
    </script>
</div>
