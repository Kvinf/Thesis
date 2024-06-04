<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../yourproject.css">
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif
    <title>Project</title>
    <style>
        .accordion-button::after {
            content: none;
        }
        .accordion-button {
            display: flex;
            flex-direction: column;
            align-items: start;
        }
        .http-button {
            padding: 5px;
            color: white;
            margin-right: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        @if (Auth::check())
            <a href="{{ route('logout') }}">Logout</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endif
    </nav>
    <div class="main">
        <header style=" display: flex; justify-content: center;">
            <form class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </header>

        <div class="project-name" style="display: flex; justify-content:space-between">
            <h2>{{ $project->projectName }}</h2>
            <div>
                <a href="{{ route('addapi', ['id' => $project->id]) }}" class="btn btn-success">Add API</a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProjectModal">Edit Project</button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCateogryModal">Add Category</button>
            </div>

        </div>

        <div class="project-description">
            <p><strong>Description</strong></p>
            <p>{{ $project->description }}</p>
        </div>

        <div class="accordion" id="accordionExample">
            @foreach ($api as $category)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#category-{{ $loop->index }}" aria-expanded="false">
                            <strong>{{ $category['category'] }}</strong>
                        </button>
                    </h2>
                    <div id="category-{{ $loop->index }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach ($category['api'] as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#api-{{ $item->id }}" aria-expanded="false">
                                            @if ($item->method == 'GET')
                                                <div class="http-button" style="background-color: green">GET</div>
                                            @elseif ($item->method == 'POST')
                                                <div class="http-button" style="background-color: yellow">POST</div>
                                            @elseif ($item->method == 'DELETE')
                                                <div class="http-button" style="background-color: red">DELETE</div>
                                            @elseif ($item->method == 'PATCH')
                                                <div class="http-button" style="background-color: purple">PATCH</div>
                                            @elseif ($item->method == 'PUT')
                                                <div class="http-button" style="background-color: blue">PUT</div>
                                            @endif
                                            {{ $item->title }}
                                        </button>
                                    </h2>
                                    <div id="api-{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#category-{{ $loop->parent->index }}">
                                        <div class="accordion-body">
                                            <pre class="code-detail"><code style="color:white; height: auto">{{ $item->result }}</code></pre>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Edit Project Modal -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('updateproject') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editProjectModalLabel">Edit Project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $project->id }}">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Project Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $project->projectName }}">
                        </div>
                        <div class="mb-3">
                            <label for="private" class="col-form-label">Status:</label>
                            <div class="form-check">
                                <input @if ($project->privateFlag == true) checked @endif class="form-check-input" type="radio" name="private" id="private1" value="1">
                                <label class="form-check-label" for="private1">Private</label>
                            </div>
                            <div class="form-check">
                                <input @if ($project->privateFlag == false) checked @endif class="form-check-input" type="radio" name="private" id="private2" value="0">
                                <label class="form-check-label" for="private2">Public</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description">{{ $project->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCateogryModal" tabindex="-1" aria-labelledby="addCateogryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addcategory') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addCateogryModalLabel">Add Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="projectId" value="{{ $project->id }}">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="categoryName">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
