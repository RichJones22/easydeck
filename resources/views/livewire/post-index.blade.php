<div>
    <p class="text-6xl">
        What Posts...
    </p>

    <br>
    <br>
    @foreach($posts as $post)
        <div>post is: {{ $post }}</div>
        <hr>
    @endforeach

</div>

