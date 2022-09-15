<!DOCTYPE>
<html lang="en">
<head>
    <title>Laravel Example</title>
</head>
<body>
<div>
    <div class="container">
        @foreach ($users as $user)
            {{$user->id}}. {{ $user->username }} <br />
        @endforeach
    </div>

    <div>{{ $users->links() }}</div>
</div>
</body>
</html>
