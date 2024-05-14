<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../dashboard.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif
</head>

<body>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>
    <div class="main">
        <header style="   display: flex;
        justify-content: center;">
            <form class="search-bar">
                @csrf
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </header>
        <div class="content">
            <div class="title-container">
                <h2 class="content-title">Public API</h2>
            </div>
            <div class="vertical-card-container">

                <div class="vertical-card">
                    <h3>Vertical Card 1</h3>
                    <p>More detailed description for vertical card one. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 2</h3>
                    <p>More detailed description for vertical card two. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 3</h3>
                    <p>More detailed description for vertical card three. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 4</h3>
                    <p>More detailed description for vertical card three. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 5</h3>
                    <p>More detailed description for vertical card three. You can put even more information here.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('addproject') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Create a Blank API</h1>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Project Name :</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <label for="message-text" class="col-form-label">Status:</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="private" value="1"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Private</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="private" value="0"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Public</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="message-text" name="description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
