<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('dashboard.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                alert("{{ $errors->first() }}");
            });
        </script>
    @endif

    @yield('header')
</head>

<body>
    <div id="close-menu"></div>
    <div class="main">
        <nav id="nav-bar">
            <div class="icon" id="close-icon"
                style="align-self: flex-end; margin-right : 10px; width : 30px; height : 30px; "><img
                    style="width : 25px; height : 25px; " src="{{asset('cancel2-svgrepo-com.svg')}}" s></div>
            <a href="{{ route('dashboard') }}">Home</a>
            @if (Auth::check())
                <a href="{{ route('profile') }}">Profile</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </nav>
        <header style="   display: flex;
        justify-content: space-between;">
            <div class="icon" id="menu-icon"><img src="{{asset('../align-justify-svgrepo-com.svg')}}"></div>
            <div class="search-bar">

                <input type="text" id="searchValue" placeholder="Search...">
                <button type="submit" onclick="searchClick()">Search</button>
            </div>
        </header>
        @yield('content')


    </div>

</body>
<script src="../script.js"></script>
<script>
    function searchClick() {
        const searchValue = document.getElementById("searchValue").value;
        const categorySearchElement = document.getElementById("categorySearch");
        let category = "projectname"; 


        if (categorySearchElement) {
            category = categorySearchElement.value;

        } 

        window.location.href = "{{ route('search') }}" + "?search=" + encodeURIComponent(searchValue) + "&category=" +
            encodeURIComponent(category);
    }
</script>

</html>
