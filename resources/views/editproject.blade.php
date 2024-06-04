<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../editproject.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Your Project</title>

    <style>
        .accordion-button::after {
            content:  none
        }
        .accordion-button{
            display: flex;
            flex-direction: column;
            align-items: start;
        }
        .card{
            flex-direction: row;
        }
    </style>
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

        <div class="content">
            <div>
                <h2>Setting</h2>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="min-width: 150px">Project Name :</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <label for="message-text" class="col-form-label" style="min-width: 150px">Status:</label>
            <div class="custom-control custom-radio custom-control-inline form-group">
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
                <label for="message-text" class="col-form-label" style="min-width: 150px">Description:</label>
                <textarea class="form-control" id="message-text" name="description"></textarea>
            </div>
            <div>
                Access:
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/150" alt="">
                <div>iloveyou@gmail.com</div>
                <div>admin</div>
                <button type="button" class="btn btn-dark" style="">Dark</button>
            </div>
        </div>
    </div>
</body>
</html>
