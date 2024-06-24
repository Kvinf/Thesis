<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="{{asset('otp.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    a:hover {
        color: blue;
    }
</style>
<body>
    <div class="containers">
        <form method="POST" action="{{ route('otpPost') }}">
            @csrf
            <div class="credential">
                <h1>OTP Verification</h1>
                <br>
                <h4 style="text-align: center" style="margin-bottom: 10px">One Time Password (OTP) has been sent via Email to<br/>Email</h4>
                <input id="otp" name="otp" style="margin-bottom: 10px" required>
                <button class="custom-button submit-button" style="margin-bottom: 10px" type="submit">Verify</button>
                <p >Haven't received the OTP? <a href="">Resend</a></p>
            </div>
        </form>
    </div>
</body>

</html>