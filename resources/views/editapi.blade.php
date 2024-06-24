@extends('layout')

@section('header')
    <link rel="stylesheet" href="../addapi.css">
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
                        <h2 class="content-title">Edit API</h2>
                    </div>
                    <div class="vertical-card-container" style="width: 70%">
                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                        <input type="hidden" name="apiId" value="{{$apiId}}" >
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
                            <p class="form-title">Category</p>
                            <select class="form-input-textbox" name="categoryId">
                                <option value=""
                                    {{ old('method', $input['categoryId'] ?? '') == '' ? 'selected' : '' }}>
                                    Uncategorized</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('method', $input['categoryId'] ?? '') == $item->categoryId ? 'selected' : '' }}>
                                        {{ $item->categoryName }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div clas <div class="form-input-section">
                            <p class="form-title">Description</p>
                            <textarea class="form-input-textbox" name="description" style="resize : none"> {{ old('description', $input['description'] ?? '') }}</textarea>
                        </div>
                        @if ($authCheck == true)
                            <div class="form-input-section">
                                <p class="form-title">Authorization</p>
                                <div style="display: flex; align-items : center">
                                    <input style="height: auto; margin: 0" class="form-check-input" type="checkbox"
                                        id="flexCheckDefault" name="authorization"
                                        {{ old('authorization', $input['authorization'] ?? false) ? 'checked' : '' }} />
                                    <label style="height: auto ; margin :0 5px" class="form-check-label"
                                        for="flexCheckDefault">
                                        Enable
                                    </label>
                                </div>
                            </div>
                        @endif
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
                            <p class="form-title">Category</p>
                            <select class="form-input-textbox" name="category">
                                <option value=""
                                    {{ old('method', $input['method'] ?? '') == '' ? 'selected' : '' }}>
                                    Uncategorized</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('method', $input['method'] ?? '') == $item->categoryName ? 'selected' : '' }}>
                                        {{ $item->categoryName }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Description</p>
                            <textarea class="form-input-textbox" name="description" style="resize : none"> {{ old('description', $input['description'] ?? '') }}</textarea>
                        </div>
                        @if ($authCheck == true)

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
                        @endif

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
