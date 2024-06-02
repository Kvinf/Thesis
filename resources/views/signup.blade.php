<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="../signup.css">
    <!-- Latest compiled and minified CSS -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div class="containers">
        <div class="left_side">
            <div class="logo">
                <img src="https://media.neliti.com/media/organisations/logo-219-binus.png" alt="missing">
            </div>
        </div>
        <div class="right_side">
            <div>
                <form action="{{ route('registerPost') }}" method="POST">
                    @csrf
                    <div class="credential">
                        <div class="input_container">
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="input_container">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input_container">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button class="submit" type="submit">Sign Up</button>
                    </div>
                    <div class="line"></div>
                    <div class="log_in">
                        <p>Already have an account? <a class="linkItem" href="{{ route('login') }}">Log in</a></p>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
