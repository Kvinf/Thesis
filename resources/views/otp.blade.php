<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>



<body>
    <div class="container">
        <form method="POST" action="{{ route('otpPost') }}">
            @csrf
            
            <label for="email">OTP : </label>
            <input type="otp" id="otp" name="otp" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>