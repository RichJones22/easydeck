<div>
    <p class="text-6xl">
        What Posts...
    </p>

    <div class="flex mt-4 mb-4">
        <form method="POST" action="/PostCreate">
            @csrf
            <label class="text-xl text-gray-700 text-sm font-bold mb-2" for="post">
                enter post:
            </label>
            <input class="ml-2 shadow appearance-none border rounded py-2 px-3
                      text-gray-700 leading-tight focus:outline-none
                      focus:shadow-outline"
                   id="post" name="post" type="text" placeholder="post here...">

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Press Me
            </button>
        </form>
    </div>

    <livewire:flash-container />

    <br>
    <br>
    @foreach($posts as $value)
        <div class="flex">
            <div class="text-2xl">post is:</div>
            <div class="italic ml-4"> {{ $value->post }}</div>
        </div>
        <hr>
    @endforeach


</div>

