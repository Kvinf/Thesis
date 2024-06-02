<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../yourproject.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Project</title>

    <style>
        .accordion-button::after {
            content: none
        }

        .accordion-button {
            display: flex;
            flex-direction: column;
            align-items: start;
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

        <div class="project-name">
            <h2>{{ $project->projectName }}</h2>
            <a href="{{ route('addapi', ['id' => $project->id]) }}" class="btn btn-submit">Add API</a>
        </div>  
            <h2>Project Kevin</h2>
            <button class="title-button btn-dark" data-toggle="modal" data-target="#exampleModal" fdprocessedid="fke4lf">Edit</button>
        </div>

        <div class="project-description">
            <p><strong>Description</strong></p>
            <p>{{ $project->description }}</p>
        </div>

        <div class="accordion" id="accordionExample">

            @foreach ($api as $item)
                <div class="accordion-item">
                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ $item->id }}" aria-expanded="false" style ="content: none">

                            @if ($item->method == 'GET')
                                <div class ="http-button" style="background-color: green">GET</div>
                            @elseif ($item->method == 'POST')
                                <div class ="http-button" style="background-color: yellow">POST</div>
                            @elseif ($item->method == 'DELETE')
                                <div class ="http-button" style="background-color: red">DELETE</div>
                            @elseif ($item->method == 'PATCH')
                                <div class ="http-button" style="background-color: purple">PATCH</div>
                            @elseif ($item->method == 'PUT')
                                <div class ="http-button" style="background-color: blue">PUT</div>
                            @endif
                            {{ $item->title }}
                        </button>
                    </h2>

                    <div id="{{ $item->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <pre class="code-detail"><code style="color:white ;height : auto">{{ $item->result }}
                      </code>
                        </pre>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
