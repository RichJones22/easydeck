<!DOCTYPE html>
<html>
    <head>
        <title>Learn Infinity - Laravel Creating your first Laravel Application</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5 - {{$page_name}}</div>
</div>
</div>
<ul>
    @if(count($tasks)>0)
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    @endif
</ul>
</body>
</html>
