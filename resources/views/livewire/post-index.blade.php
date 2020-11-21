<div>
    <p class="text-6xl">
        What Posts...
    </p>

    {{-- display the form --}}
    <div class="flex mt-4 mb-4">
        <form wire:submit.prevent="submitForm">
            @csrf
            <label class="text-xl text-gray-700 text-sm font-bold mb-2" for="post">
                enter post:
            </label>

            <input wire:model.defer="post" class="ml-2 shadow appearance-none border rounded py-2 px-3
                      text-gray-700 leading-tight focus:outline-none
                      focus:shadow-outline"
                   id="post" name="post" type="text" placeholder="post here...">

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Press Me
            </button>
        </form>
    </div>

    {{-- display errors --}}
    @if ($errors->has('post'))
        <span class="text-red-900">{{ $errors->first('post') }}</span>
    @endif

    {{-- display flash message --}}
    <livewire:flash-container />

    <br>
    <br>

    {{-- if no posts let the user know... --}}
    @if(($posts->isEmpty()))
        <div>be the first to enter a post...</div>
    @endif

    {{-- display the post, and allow for post deletion --}}
    @foreach($posts as $key)
        <div class="flex justify-between">
            <div class="flex">
                <div class="text-2xl">post is:</div>
                <div class="italic ml-4"> {{ $key->post }}</div>
            </div>
            <button id="delete" class="inline-flex rounded-md p-1.5" wire:click="delete(' {{ $key->id }} ')">
                &times;
            </button>
        </div>
        <hr>
    @endforeach
</div>

