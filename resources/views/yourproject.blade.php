@extends('layout')

@section('header')
    <link rel="stylesheet" href="../yourproject.css">
@endsection

@section('content')

    <div class="main-content">
        <div style="min-width : 75%">
            <div class="project-name" style="display: flex; justify-content:space-between;align-items : center;">
                <h2 class="content-title">{{ $project->projectName }}</h2>
                <div>
                    @if ($role > 1)
                        <a href="{{ route('addapi', ['id' => $project->id]) }}"><img style="width : 25px; height : 25px;"
                                src="../plus-large-svgrepo-com.svg"></a>
                        @if ($role == 3)
                            <button style="background-color: transparent; border : none" data-toggle="modal"
                                data-target="#editProjectModal"><img style="width : 25px; height : 25px;"
                                    src="../edit-3-svgrepo-com.svg"></button>
                            <button style="background-color: transparent; border : none" class="btn btn-primary"
                                data-toggle="modal" data-target="#addCateogryModal"><img
                                    style="width : 25px; height : 25px;" src="../category-2-svgrepo-com.svg"></button>
                            <button style="background-color: transparent; border : none" data-toggle="modal"
                                data-target="#addAccessModal"><img style="width : 25px; height : 25px;"
                                    src="../user-list-bold-svgrepo-com.svg"></button>
                        @endif
                    @endif
                </div>

            </div>

            <div class="project-description">
                <p style="font-size: 16px "><strong>Description</strong></p>
                <p>{{ $project->description }}</p>
            </div>

            <div class="accordion" id="accordionCategory">
                @foreach ($api as $category)
                    <div class="accordion-item">
                        <div class="accordion-button collapsed category-header" data-toggle="collapse"
                            data-target="#category-{{ $loop->index }}" aria-expanded="false">
                            <strong>{{ $category['category'] }}</strong>
                        </div>
                        <div id="category-{{ $loop->index }}" class="accordion-collapse collapse"
                            data-parent="#accordionCategory">
                            @foreach ($category['api'] as $item)
                                <div class="accordion-item">
                                    <div class="accordion-button collapsed" type="button" data-toggle="collapse"
                                        data-target="#api-{{ $item->id }}" aria-expanded="false"
                                        style="display:flex;flex-direction: row; justify-content:space-between">
                                        <div>
                                            @if ($item->method == 'GET')
                                                <div class="http-button" style="color: green">GET</div>
                                                wda
                                            @elseif ($item->method == 'POST')
                                                <div class="http-button" style="color: yellow">POST</div>
                                            @elseif ($item->method == 'DELETE')
                                                <div class="http-button" style="color: red">DELETE</div>
                                            @elseif ($item->method == 'PATCH')
                                                <div class="http-button" style="color: purple">PATCH
                                                </div>
                                            @elseif ($item->method == 'PUT')
                                                <div class="http-button" style="color: blue">PUT</div>
                                            @endif
                                            {{ $item->title }}
                                        </div>
                                        @if ($role > 1)
                                            <button style="background-color: transparent; border : none" data-toggle="modal"
                                                data-target="#editProjectModal"><img
                                                    style="z-index : 2;width : 25px; height : 25px;"
                                                    src="../edit-3-svgrepo-com.svg"></button>
                                        @endif
                                    </div>
                                    <div id="api-{{ $item->id }}" class="accordion-collapse collapse"
                                        data-parent="#category-{{ $loop->parent->index }}">
                                        <div class="accordion-body">
                                            <pre class="code-detail"><code style="color:white; height: auto">{{ $item->result }}</code></pre>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                @endforeach
            </div>
            <!-- Edit Project Modal -->
            <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #222831 ">
                        <form action="{{ route('updateproject') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editProjectModalLabel"
                                    style="color:#f4f4f4; font-weight:bold; font-size : 25px">Edit Project</h1>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="{{ $project->id }}">
                                <div class="mb-3">
                                    <label for="name" class="col-form-label label-item ">Project Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        style=" border: 2px solid #333; background-color: transparent; color : #f4f4f4"
                                        value="{{ $project->projectName }}">
                                </div>
                                <div class="mb-3">
                                    <label for="private" class="col-form-label label-item">Status:</label>
                                    <div class="form-check">
                                        <input @if ($project->privateFlag == true) checked @endif class="form-check-input"
                                            type="radio" name="private" id="private1" value="1">
                                        <label class="form-check-label label-item" for="private1">Private</label>
                                    </div>
                                    <div class="form-check">
                                        <input @if ($project->privateFlag == false) checked @endif class="form-check-input"
                                            type="radio" name="private" id="private2" value="0">
                                        <label class="form-check-label label-item" for="private2">Public</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="col-form-label label-item">Description:</label>
                                    <textarea class="form-control" id="description" name="description"
                                        style=" border: 2px solid #333; background-color: transparent; color : #f4f4f4">{{ $project->description }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="custom-button close-button"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="custom-button submit-button">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add Category Modal -->
            <div class="modal fade" id="addCateogryModal" tabindex="-1" aria-labelledby="addCateogryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #222831 ">
                        <form action="{{ route('addcategory') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editProjectModalLabel"
                                    style="color:#f4f4f4; font-weight:bold; font-size : 25px">Add Category</h1>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="id" name="projectId"
                                    value="{{ $project->id }}">
                                <div class="mb-3">
                                    <label for="name" class="col-form-label label-item">Category Name:</label>
                                    <input type="text" class="form-control"
                                        id="name"style=" border: 2px solid #333; background-color: transparent; color : #f4f4f4"
                                        name="categoryName">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="custom-button close-button"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="custom-button submit-button">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addAccessModal" tabindex="-1" aria-labelledby="addAccessModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #222831">
                        <form action="{{ route('addaccess') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addCateogryModalLabel"
                                    style="color:#f4f4f4; font-weight:bold; font-size : 25px">Add Access</h1>

                            </div>
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="id" name="projectId"
                                    value="{{ $project->id }}">
                                <div class="mb-3" style="margin-bottom: 10px ">
                                    <label for="name" class="col-form-label label-item">Email :</label>
                                    <input type="text" class="form-control"
                                        style=" border: 2px solid #333; background-color: transparent; color : #f4f4f4"
                                        id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <p class="form-title label-item">Access</p>
                                    <div style="display: flex;justify-content:space-between;align-items:center">
                                        <select class="form-input-textbox" name="access">
                                            <option value="1">
                                                Viewer</option>
                                            <option value="2">
                                                Admin</option>
                                        </select>
                                        <button type="submit" class="custom-button submit-button">Add</button>
                                    </div>
                                </div>
                        </form>

                        <div style="border: 1px #333 solid; width : 100% ; height:1px; margin:10px 0px"></div>
                        <div class="access-body">
                            <h4 class="label-item">Access List</h4>
                            <form action="{{ route('updateaccess') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @foreach ($accesslist as $user)
                                    <div class="access-item">
                                        <input type="hidden" class="form-control" id="id" name="projectId"
                                            value="{{ $project->id }}">
                                        <input name="userIds[]" value="{{ $user->id }}" type="hidden">
                                        <label class="label-item">{{ $user->email }}</label>
                                        <select class="form-input-textbox" name="accessLevels[]">
                                            @if ($user->access == 3)
                                                <option value="3" selected>
                                                    Owner</option>
                                            @else
                                                <option value="1" {{ $user->access == 1 ? 'selected' : '' }}>
                                                    Viewer</option>
                                                <option value="2" {{ $user->access == 2 ? 'selected' : '' }}>
                                                    Admin</option>
                                            @endif
                                        </select>
                                    </div>
                                @endforeach

                        </div>
                        <div class="modal-footer" style="padding: 5px 0px">
                            <button type="button" class="custom-button close-button" data-dismiss="modal">Close</button>
                            <button type="submit" style="margin-right : 0" class="custom-button submit-button">Save
                                changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<script></script>
