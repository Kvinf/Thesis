<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../signup.css"    >
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="containers">
        <div class="left_side">
            <button class="page login">Login</button>
            <button class="page signup">Sign Up</button>
        </div>
        <div class="right_side">
            <div class="logo">
                <img src="https://media.neliti.com/media/organisations/logo-219-binus.png" alt="missing"> 
            </div>
            <div>
                <div class="credential">
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <div>
                            <button class="button fpassword">Forgot Password?</button>
                            <button class="button submit">Submit</button>
                        </div>
                </div>
            </div>
        </div>
        
        <!-- @if(Auth::check())
        <p>You Are Logged In</p>
        @else
        <form method="POST" action="{{ route('registerPost') }}">
            @csrf {{-- CSRF token for security --}}

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <button type="submit">Sign Up</button>
        </form>
        @endif -->
    </div>

</body>

</html>

