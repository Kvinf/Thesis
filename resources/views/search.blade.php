@extends('layout')

@section('header')
@endsection

@section('content')
    <div class="main-content">
        <div class="public-content">
            <div class="public-content-inner">
                <div class="title-container">
                    <h2 class="content-title">Search</h2>
                </div>
                <div class="vertical-card-container">
                    <div class="category-container">
                        <input type="hidden" value="" id="categorySearch">
                        <div onclick="categoryClick(this)" class="category-item" data-value="projectname">
                            Project
                        </div>
                        <div onclick="categoryClick(this)" class="category-item" data-value="projectauthor">
                            Author
                        </div>
                    </div>
                    @foreach ($public as $item)
                        <a class="vertical-card" href="{{ route('project', ['id' => $item->id]) }}">
                            <div class="card-title">{{ $item->projectName }}</div>
                            <div class="card-description">{{ $item->description }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function categoryClick(button) {
            var value = button.getAttribute("data-value");
            document.getElementById("categorySearch").value = value;
            searchClick();
        }

    </script>
@endsection
