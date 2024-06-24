<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('login.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                <span class="autoType">API DOCUMENTATION</span>
            </div>
        </div>
        <div class="right_side">
            <div>
                <form action="{{ route('registerPost') }}" method="POST">
                    @csrf
                    <div class="credential">
                        <div style="flex : 3 ; margin-right : 10px;margin-bottom : 10px">
                            <div style="font-weight : bold;margin-bottom : 10px">Username</div>
                            <input type="text" class="form-control" id="name" name="username"
                                style="color : #f4f4f4 ; background-color: transparent">
                        </div>
                       
                        <div style="flex : 3 ; margin-right : 10px;margin-bottom : 10px">
                            <div style="font-weight : bold;margin-bottom : 10px">Email</div>
                            <input type="text" class="form-control" id="name" name="email"
                                style="color : #f4f4f4 ; background-color: transparent">
                        </div>
                        <div style="flex : 3 ; margin-right : 10px;margin-bottom : 10px">
                            <div style="font-weight : bold;margin-bottom : 10px">Password</div>
                            <input type="password" class="form-control" id="password" name="password"
                                style="color : #f4f4f4 ; background-color: transparent">
                        </div>
                        <button class="custom-button submit-button" type="submit">Sign Up</button>
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
