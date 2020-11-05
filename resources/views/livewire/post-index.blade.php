<div>
    <p class="text-6xl">
        What Posts...
    </p>

    <br>
    <br>
    @foreach($posts as $value)

        <div class="flex">
            <div class="text-2xl">post is:</div>
            <div class="italic ml-4">post is: {{ $value->post }}</div>
        </div>
        <hr>
    @endforeach

</div>

