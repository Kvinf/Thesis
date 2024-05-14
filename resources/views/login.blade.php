<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../login.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                <form action="{{ route('loginPost') }}" method="POST">
                    @csrf
                    <div class="credential">
                        <div class="input_container">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input_container">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div>
                            <a href="http://">Forgot password?</a>
                            <button class="submit" type="submit">Log in</button>
                        </div>
                    </div>
                </form>
                <div class="line"></div>
                <div class="sign_up">
                    <p>Don't have an account yet? <a href="">Sign Up</a></p>
                </div>
            </div>
        </div>
</body>

</html>
