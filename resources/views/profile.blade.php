@extends('layout')

@section('header')
    <link rel="stylesheet" href="{{asset('profile.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <div style="min-width: 50%">
            <div class="title-container">
                <h2 class="content-title">Personal Information</h2>
            </div>
            <div class="profile-content">
                <div class="profile-info">
                    <div class="detail-container">
                        <form method="POST" action="{{ route('editusername') }}"
                            style="display: flex; justify-content:space-between; align-items:flex-end">
                            @csrf
                            <div style="flex : 3 ; margin-right : 10px">
                                <div style="font-weight : bold;">Username</div>
                                <input type="text" class="form-control" id="name" name="username"
                                    style="color : #f4f4f4 ; background-color: transparent" value="{{ $items->username }}">
                            </div>
                            <div>
                                <button type="submit" style="flex:1" class="custom-button submit-button">Edit</button>
                            </div>
                        </form>

                    </div>
                    <div class="detail-container">
                        <div style="font-weight : bold;">Email</div>
                        <div>{{ $items->email }}</div>
                    </div>
                </div>
            </div>


            <div class="title-container">
                <h2 class="content-title">Account</h2>
            </div>

            <div class="profile-content">

                <div class="profile-info" style="display: inline-flex; s">

                    <div class="detail-container" style="width : 100%;justify-content: space-between; margin-bottom : 0">
                        <div class="flex-container" style="justify-content: space-between; margin-bottom : 0">
                            <div>
                                <p style="margin: 0px">Password</p>
                                <p style="font-size: 13px; opacity: 80%;">Change your Password</p>
                            </div>
                            <button type="button" class="custom-button submit-button"data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Change
                                Password</button>
                        </div>

                    </div>


                </div>
                <div class="profile-info">
                    <div class="collapse" id="collapseExample">
                        <div class="detail-container">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Current Password:</label>
                                <input type="password" style="color : #f4f4f4 ; background-color: transparent"
                                    class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">New Password:</label>
                                <input type="password" style="color : #f4f4f4 ; background-color: transparent"
                                    class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Confirm New Password:</label>
                                <input type="password"style="color : #f4f4f4 ; background-color: transparent"
                                    class="form-control" id="name" name="name">
                            </div>
                            <div style="margin-top: 30px">
                                <button class="custom-button submit-button" onclick="onClickAlert()">Update Password</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-info">

                    <div class="detail-container"  style="width : 100%;">
                        <div class="flex-container" style="justify-content: space-between">
                            <div>
                                <p style="margin: 0px">Delete Your Account</p>
                                <p style="font-size: 13px; opacity: 80%;">Permanently Delete Your Account</p>
                            </div>
                            <button type="button" class="custom-button close-button">Delete Account</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function onClickAlert() {
            alert("Password must be different from the previous one");
        }
    </script>
@endsection
