<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif

    @yield('header')
</head>

<body>
    <nav>
        <a href="{{route("dashboard")}}">Home</a>
        <a href="{{route("profile")}}">Profile</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        @if (Auth::check())
        <a href="{{route("logout")}}">Logout</a>    

        @else
        <a href="{{route("login")}}">Login</a>    

        @endif
    </nav>
    
    @yield('content')

    <script src="script.js"></script>
</body>
