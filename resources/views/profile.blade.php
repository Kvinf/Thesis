<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="../profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Collapse --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                    <div class="detail-container">
                        <div style="font-size: 12px; opacity: 80%;">Username</div>
                        <input type="text" class="form-control" id="name" name="name" value="{{$items->username}}">
                    </div>
                    <div class="detail-container">
                        <div style="font-size: 12px; opacity: 80%;">Email</div>
                        <div>{{$items->email}}</div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Account --}}
        <div class="profile-container">
            <div class = "profile-title">
                <h2>Account</h2>
            </div>
            <div class="account-content">
                <div class="account-alignment">
                    <div>
                        <p style="margin: 0px">Password</p>
                        <p style="font-size: 13px; opacity: 80%;">Change your Password</p>
                    </div>
                    <div>
                        <button type="button" class="btn btn-dark"data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Change Password</button>
                    </div>
                </div>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Current Password:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">New Password:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Confirm New Password:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div style="margin-top: 10px">
                            <button class="btn btn-dark" type="submit">Update Password</button>
                        </div>
                    </div>
                  </div>

                <div class="account-alignment">
                    <div>
                        <p style="margin: 0px">Delete Your Account</p>
                        <p style="font-size: 13px; opacity: 80%;">Permanently Delete Your Account</p>
                    </div>
                    <div>
                        <button type="button" class="btn btn-dark">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
