@extends('layout')

@section('header')
    <link rel="stylesheet" href="../addapi.css">
    <link rel="stylesheet" href="../yourproject.css">
@endsection

@section('content')

    <div class="main">
        <header style="display: flex;
        justify-content: center;">
            <form class="search-bar">
                @csrf
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </header>
        <div class="content">
            @if (isset($success) == true && $success != null)
                <form method="POST" action="{{ route('addapipost') }}">
                    @csrf
                    <div class="title-container">
                        <h2 class="content-title">Add API</h2>
                    </div>
                    <div class="vertical-card-container" style="width: 70%">
                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                        <div class="form-input-section">
                            <p class="form-title">Title</p>
                            <input class="form-input-textbox" name="title"
                                value="{{ old('title', $input['title'] ?? '') }}">
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">URL</p>
                            <input class="form-input-textbox" name="url"
                                value="{{ old('url', $input['url'] ?? '') }}" />
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Method</p>
                            <select class="form-input-textbox" name="method">
                                <option value="GET"
                                    {{ old('method', $input['method'] ?? '') == 'GET' ? 'selected' : '' }}>
                                    GET</option>
                                <option value="POST"
                                    {{ old('method', $input['method'] ?? '') == 'POST' ? 'selected' : '' }}>
                                    POST</option>
                                <option value="PUT"
                                    {{ old('method', $input['method'] ?? '') == 'PUT' ? 'selected' : '' }}>
                                    PUT</option>
                                <option value="PATCH"
                                    {{ old('method', $input['method'] ?? '') == 'PATCH' ? 'selected' : '' }}>
                                    PATCH</option>
                                <option value="DELETE"
                                    {{ old('method', $input['method'] ?? '') == 'DELETE' ? 'selected' : '' }}>DELETE
                                </option>
                            </select>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Description</p>
                            <textarea class="form-input-textbox" name="description" style="resize : none"> {{ old('description', $input['description'] ?? '') }}</textarea>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Authorization</p>
                            <div style="display: flex; align-items : center">
                                <input style="height: auto; margin: 0" class="form-check-input" type="checkbox"
                                    id="flexCheckDefault" name="enable"
                                    {{ old('authorization', $input['authorization'] ?? false) ? 'checked' : '' }} /> <label
                                    style="height: auto ; margin :0 5px" class="form-check-label" for="flexCheckDefault">
                                    Enable
                                </label>
                            </div>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Header</p>
                            <textarea class="auto-resize-textarea" name="header" id="autoResizeTextarea"> {{ old('header', $input['header'] ?? '') }}</textarea>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Body</p>
                            <textarea class="auto-resize-textarea" name="body" id="autoResizeTextarea">{{ old('body', $input['body'] ?? '') }}</textarea>
                        </div>
                        <input type="hidden" name="result" value="{{ $success }}">

                        @if (isset($success) == true && $success != null)
                            <pre class="code-detail"><code style="color:white">{{ $success }}
                        </code>
                    </pre>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
            @else
                <form method="POST" action="{{ route('testapi') }}">
                    @csrf
                    <div class="title-container">
                        <h2 class="content-title">Add API</h2>
                    </div>
                    <div class="vertical-card-container" style="width: 70%">
                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                        <div class="form-input-section">
                            <p class="form-title">Title</p>
                            <input class="form-input-textbox" name="title"
                                value="{{ old('title', $input['title'] ?? '') }}">
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">URL</p>
                            <input class="form-input-textbox" name="url"
                                value="{{ old('url', $input['url'] ?? '') }}" />
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Method</p>
                            <select class="form-input-textbox" name="method">
                                <option value="GET"
                                    {{ old('method', $input['method'] ?? '') == 'GET' ? 'selected' : '' }}>
                                    GET</option>
                                <option value="POST"
                                    {{ old('method', $input['method'] ?? '') == 'POST' ? 'selected' : '' }}>
                                    POST</option>
                                <option value="PUT"
                                    {{ old('method', $input['method'] ?? '') == 'PUT' ? 'selected' : '' }}>
                                    PUT</option>
                                <option value="PATCH"
                                    {{ old('method', $input['method'] ?? '') == 'PATCH' ? 'selected' : '' }}>
                                    PATCH</option>
                                <option value="DELETE"
                                    {{ old('method', $input['method'] ?? '') == 'DELETE' ? 'selected' : '' }}>DELETE
                                </option>
                            </select>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Description</p>
                            <textarea class="form-input-textbox" name="description" style="resize : none"> {{ old('description', $input['description'] ?? '') }}</textarea>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Authorization</p>
                            <div style="display: flex; align-items : center">
                                <input style="height: auto; margin: 0" class="form-check-input" type="checkbox"
                                    id="flexCheckDefault" name="authorization" value="1"
                                    {{ old('authorization', $input['authorization'] ?? false) ? 'checked' : '' }} /> <label
                                    style="height: auto ; margin :0 5px" class="form-check-label" for="flexCheckDefault">
                                    Enable
                                </label>
                            </div>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Header</p>
                            <textarea class="auto-resize-textarea" name="header" id="autoResizeTextarea"> {{ old('header', $input['header'] ?? '') }}</textarea>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Body</p>
                            <textarea class="auto-resize-textarea" name="body" id="autoResizeTextarea">{{ old('body', $input['body'] ?? '') }}</textarea>
                        </div>

                        @if (isset($fail) == true && $fail != null)
                            <input type="hidden" name="result" value="{{ $fail }}">

                            <pre class="code-detail"><code style="color:white">{{ $fail }}
                        </code>
                    </pre>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-submit">Test</button>
                </form>
            @endif
        </div>
    </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('autoResizeTextarea');
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
            textarea.dispatchEvent(new Event('input'));
        });
    </script>
