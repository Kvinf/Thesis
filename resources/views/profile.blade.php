<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="../profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>
    <div class="main">
        <header style=" display: flex; justify-content: center;">
            <form class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </header>

        <div class="profile-container">
            <div class = "profile-title">
                <h2>Personal Information</h2>
            </div>
            <div class="profile-content">
                <div class="profile-picture">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture">
                </div>
                <div class="profile-info">
                    <div class="flexbox-horizontal">
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">First Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">Last Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                    </div>
                    <div class="flexbox-horizontal">
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">First Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">Last Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                    </div>
                </div>
                <div><button type="button" class="btn btn-dark">Edit</button></div>
            </div>

        </div>

        {{-- Address --}}
        <div class="profile-container">
            <div class = "profile-title">
                <h2>Address</h2>
            </div>
            <div class="profile-content">
                <div class="profile-info">
                    <div class="flexbox-horizontal">
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">First Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">Last Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                    </div>
                    <div class="flexbox-horizontal">
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">First Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                        <div class="detail-container">
                            <div style="font-size: 12px; opacity: 80%;">Last Name</div>
                            <div>Nama orangnya disini abang</div>
                        </div>
                    </div>
                </div>
                <div><button type="button" class="btn btn-dark">Edit</button></div>
            </div>
        </div>
    </div>
</body>
</html>
