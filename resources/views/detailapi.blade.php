@extends('layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('addapi.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <div style="min-width : 75%">
            <div class="title-container">
                <h2 class="content-title">API Detail</h2>
            </div>
            <div class="vertical-card-container" style="width: 70%">
=                <div class="form-input-section">
                    <p class="form-title">Title</p>
                    <input class="form-input-textbox" name="title" value="{{$detail->title}}" disabled />
                </div>
                <div class="form-input-section">
                    <p class="form-title">URL</p>
                    <input class="form-input-textbox" name="url" value="{{$detail->url}}" disabled/>
                </div>
                <div class="form-input-section">
                    <p class="form-title">Method</p>
                    <input class="form-input-textbox" name="url" value="{{$detail->method}}" disabled />

                </div>
                <div class="form-input-section">
                    <p class="form-title">Category</p>
                    <input class="form-input-textbox" name="url" value="{{$categoryName->categoryName}}" disabled />

                </div>
                <div class="form-input-section">
                    <p class="form-title">Description</p>
                    <textarea class="form-input-textbox" name="description" style="resize : none"> {{$detail->description}}</textarea>
                </div>
                <div class="form-input-section">
                    <p class="form-title">Authorization</p>
                    @if ($detail->authorization == false) 
                    <div class="form-title">None</div>
                    @else 
                    <div class="form-title">Required</div>
                    @endif
                </div>
                <div class="form-input-section">
                    <p class="form-title">Header</p>
                    <textarea class="auto-resize-textarea autoResizeTextarea" name="header" id="" disabled> {{$detail->header}}</textarea>
                </div>
                <div class="form-input-section">
                    <p class="form-title">Body</p>
                    <textarea class="auto-resize-textarea autoResizeTextarea" name="body" id="" disabled>{{$detail->body}}</textarea>
                </div>

                <pre class="code-detail"><code style="color:white">{{ $detail->result }}
                        </code>
                    </pre>
            </div>

        </div>
    </div>
@endsection
