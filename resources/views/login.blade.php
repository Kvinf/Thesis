<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>



<body>
    <div class="container">
        @if(Auth::check())
        <p>You Are Logged In</p>
        @else
        @php
        echo Session::get('foo', 'Default value if foo does not exist');
        @endphp
        <form method="POST" action="{{ route('loginPost') }}">
            @csrf
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        @endif
    </div>
</body>

</html>