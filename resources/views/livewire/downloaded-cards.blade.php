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

                <label for="fileName">
                    <input id="fileName{{ $cardKey->id }}" class="italic ml-4" name="fileName" type="text" value="{{ $cardKey->file_name }}"  disabled>
                </label>
                <label for="title">
                    <input id="title{{ $cardKey->id }}" class="ml-5" name="title" type="text" value="{{ $cardKey->title }}" disabled>
                </label>
                <label for="description">
                    <input id="description{{ $cardKey->id }}" class="ml-5" name="description" type="text" value="{{ $cardKey->description }}" disabled>
                </label>
            </div>

            <div class="pt-3 pb-3">
                <button id="editButtonPencil{{ $cardKey->id }}" class="inline-flex rounded-md"
                        onclick="toggleRadio({{ $cardKey->id }}, !!toggle)"
                        wire:click="$emit('display-card','{{ $cardKey->id }}')"
                >
                    <x-heroicon-o-pencil id="editCardPencil{{ $cardKey->id }}" class="w-6 h-6 text-gray-600"/>
                </button>
                <button id="editButtonServer{{ $cardKey->id }}" class="inline-flex rounded-md"
                        onclick="toggleRadio({{ $cardKey->id }}, !!toggle)"
                        wire:click="editFileName()"
                >
                    <x-heroicon-o-server id="editCardServer{{ $cardKey->id }}" class="w-6 h-6 text-blue-600" hidden/>
                </button>
                <button id="deleteCard{{ $cardKey->id }}" class="inline-flex rounded-md p-1.5"
                        wire:click="delete('{{ $cardKey->id }}')"
                >
                    <x-heroicon-o-trash class="w-6 h-6 text-red-600"/>
                </button>
            </div>
        </div>
        <hr>
    @endforeach

    <script>
        let toggle = false;

        function toggleRadio(cardId, toggle){
            if (!toggle) {
                document.getElementById('fileName'+cardId).removeAttribute("disabled");
                document.getElementById('fileName'+cardId).classList.add("border");
                document.getElementById('fileName'+cardId).classList.add("border-blue-500");
                document.getElementById('title'+cardId).removeAttribute("disabled");
                document.getElementById('title'+cardId).classList.add("border");
                document.getElementById('title'+cardId).classList.add("border-blue-500");
                document.getElementById('description'+cardId).removeAttribute("disabled");
                document.getElementById('description'+cardId).classList.add("border");
                document.getElementById('description'+cardId).classList.add("border-blue-500");
                document.getElementById('editCardPencil'+cardId).style.display = "none";
                document.getElementById('editCardServer'+cardId).style.display = "block";
                document.getElementById('fileName'+cardId).focus();
                this.toggle = true;

                disableTheRest()
            } else {
                document.getElementById('fileName'+cardId).setAttribute("disabled", "true");
                document.getElementById('title'+cardId).setAttribute("disabled", "true");
                document.getElementById('description'+cardId).setAttribute("disabled", "true");
                document.getElementById('editCardPencil'+cardId).style.display = "block";
                document.getElementById('editCardServer'+cardId).style.display = "none";
                this.toggle = false;
            }
        }

        function disableTheRest() {
            let listOfCardIds = @json($listOfCardId);

            for (let i = 0; i < listOfCardIds.length; i++) {
                document.getElementById('editButtonPencil'+listOfCardIds[i]).setAttribute("disabled", "true");
                document.getElementById('deleteCard'+listOfCardIds[i]).setAttribute("disabled", "true");
            }
        }
    </script>
</div>
