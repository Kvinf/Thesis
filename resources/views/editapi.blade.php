@extends('layout')

@section('header')
    <link rel="stylesheet" href="{{asset('addapi.css')}}">
@endsection

@section('content')

    <div class="main-content">
        <div style="min-width : 75%">
            @if (isset($success) == true && $success != null)
                <form method="POST" action="{{ route('addapipost') }}">
                    @csrf
                    <div class="title-container">
                        <h2 class="content-title">Edit API</h2>
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
                            <div class="form-drop-box">
                                <div class="form-input-dropdown drop-down-box">
                                    <input type="hidden" value="{{ old('method', $input['method'] ?? '') }}"
                                        class=" drop-down-value" style="width: 100%" name="method">
                                    </input>
                                    <div class="drop-down-input"><label
                                            class="drop-down-text">{{ old('method', $input['method'] ?? 'Choose') }}</label>
                                        <img style="width : 25px; height : 25px;" src="{{asset('dropdown-arrow-svgrepo-com.svg')}}">
                                    </div>

                                </div>
                                <div class="drop-down-value-group hide">
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'GET' ? 'selected' : '' }}"
                                        value="GET">GET</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'POST' ? 'selected' : '' }}"
                                        value="POST">POST</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'PUT' ? 'selected' : '' }}"
                                        value="PUT">PUT</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'PATCH' ? 'selected' : '' }}"
                                        value="PATCH">PATCH</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'DELETE' ? 'selected' : '' }}"
                                        value="DELETE">DELETE</div>
                                </div>
                            </div>

                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Category</p>
                            <div class="form-drop-box">
                                <div class="form-input-dropdown drop-down-box">
                                    <input type="hidden" class="drop-down-value" name="categoryId"
                                        value="{{ old('categoryId', $input['categoryId'] ?? '') }}" style="width: 100%">
                                    <div class="drop-down-input">
                                        <label class="drop-down-text">
                                            {{ $category->firstWhere('id', old('categoryId', $input['categoryId'] ?? ''))->categoryName ?? 'Choose' }}
                                        </label>
                                        <img style="width: 25px; height: 25px;" src="{{asset('dropdown-arrow-svgrepo-com.svg')}}">
                                    </div>
                                </div>
                                <div class="drop-down-value-group hide">
                                    @foreach ($category as $item)
                                        <div class="drop-down-item {{ old('categoryId', $input['categoryId'] ?? '') == $item->id ? 'selected' : '' }}"
                                            value="{{ $item->id }}">
                                            {{ $item->categoryName }}
                                        </div>
                                    @endforeach
                                    <div class="drop-down-item {{ old('categoryId', $input['categoryId'] ?? '') == '' ? 'selected' : '' }}"
                                        value="">
                                        Uncategorized
                                    </div>
                                </div>
                            </div>

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
                            <textarea class="auto-resize-textarea autoResizeTextarea" name="header" id=""> {{ old('header', $input['header'] ?? '') }}</textarea>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Body</p>
                            <textarea class="auto-resize-textarea autoResizeTextarea" name="body" id="">{{ old('body', $input['body'] ?? '') }}</textarea>
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
                <form method="POST" action="{{ route('edittestappi') }}">
                    @csrf
                    <div class="title-container">
                        <h2 class="content-title">Edit API</h2>
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
                            <div class="form-drop-box">
                                <div class="form-input-dropdown drop-down-box">
                                    <input type="hidden" class=" drop-down-value" style="width: 100%" name="method">
                                    </input>
                                    <div class="drop-down-input"><label class="drop-down-text">Choose</label> <img
                                            style="width : 25px; height : 25px;" src="{{asset('dropdown-arrow-svgrepo-com.svg')}}">
                                    </div>

                                </div>
                                <div class="drop-down-value-group hide">
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'GET' ? 'selected' : '' }}"
                                        value="GET">GET</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'POST' ? 'selected' : '' }}"
                                        value="POST">POST</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'PUT' ? 'selected' : '' }}"
                                        value="PUT">PUT</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'PATCH' ? 'selected' : '' }}"
                                        value="PATCH">PATCH</div>
                                    <div class="drop-down-item {{ old('method', $input['method'] ?? '') == 'DELETE' ? 'selected' : '' }}"
                                        value="DELETE">DELETE</div>
                                </div>
                            </div>

                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Category</p>
                            <div class="form-drop-box">
                                <div class="form-input-dropdown drop-down-box">
                                    <input type="hidden" class="drop-down-value" name="categoryId" value="{{ old('categoryId', $input['categoryId'] ?? '') }}" style="width: 100%">
                                    <div class="drop-down-input">
                                        <label class="drop-down-text">
                                            {{ $category->firstWhere('id', old('categoryId', $input['categoryId'] ?? ''))->categoryName ?? 'Choose' }}
                                        </label>
                                        <img style="width: 25px; height: 25px;" src="{{asset('dropdown-arrow-svgrepo-com.svg')}}">
                                    </div>
                                </div>
                                <div class="drop-down-value-group hide">
                                    @foreach ($category as $item)
                                        <div class="drop-down-item {{ old('categoryId', $input['categoryId'] ?? '') == $item->id ? 'selected' : '' }}" value="{{ $item->id }}">
                                            {{ $item->categoryName }}
                                        </div>
                                    @endforeach
                                    <div class="drop-down-item {{ old('categoryId', $input['categoryId'] ?? '') == '' ? 'selected' : '' }}" value="">
                                        Uncategorized
                                    </div>
                                </div>
                            </div>

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
                            <textarea class="auto-resize-textarea autoResizeTextarea" name="header" id=""> {{ old('header', $input['header'] ?? '') }}</textarea>
                        </div>
                        <div class="form-input-section">
                            <p class="form-title">Body</p>
                            <textarea class="auto-resize-textarea autoResizeTextarea" name="body" id="">{{ old('body', $input['body'] ?? '') }}</textarea>
                        </div>

                        @if (isset($fail) == true && $fail != null)
                            <input type="hidden" name="result" value="{{ $fail }}">

                            <pre class="code-detail"><code style="color:white">{{ $fail }}
                        </code>
                    </pre>
                        @endif
                    </div>
                    <button type="submit" class="custom-button submit-button">Test</button>
                </form>
            @endif
        </div>
    </div>

@endsection
