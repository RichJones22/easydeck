<div>
    <p class="text-6xl">
        What Posts...
    </p>

    <div class="flex mt-4 mb-4">
        <label class="text-xl block text-gray-700 text-sm font-bold mb-2" for="username">
            Username
        </label>
        <input class="ml-4 shadow appearance-none border rounded py-2 px-3
                      text-gray-700 leading-tight focus:outline-none
                      focus:shadow-outline"
               id="username" type="text" placeholder="post here...">
    </div>
    <br>
    <br>
    @foreach($posts as $key)

        <div class="flex">
            <div class="text-2xl">post is:</div>
            <div class="italic ml-4">post is: {{ $key->post }}</div>
        </div>
        <hr>
    @endforeach

</div>

