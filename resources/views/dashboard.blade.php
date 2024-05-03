<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        @if(Auth::check())
        <p>You Are Logged In</p>
        @else 
        <p>Tolol</p>
        @endif
    </div>
</body>

</html>