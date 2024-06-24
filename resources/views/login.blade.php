<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="{{asset('login.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                <form action="{{ route('loginPost') }}" method="POST">
                    @csrf
                    <div class="credential">
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
                        <div>
                            <button class="custom-button submit-button" type="submit">Log in</button>
                        </div>
                    </div>
                </form>
                <div class="line"></div>
                <div class="sign_up">
                    <p>Don't have an account yet? <a href="{{ route('signup') }}">Sign Up</a></p>
                </div>
            </div>
        </div>
</body>


<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    // var type = new Typed(".autoType", {
    //     strings : ["API Documentation","Thesis dapat A"],
    //     typeSpeed : 150,
    //     backSpeed : 150,
    //     loop : true
    // });

</script>

</html>
