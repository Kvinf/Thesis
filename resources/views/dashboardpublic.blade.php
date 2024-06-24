    @extends('layout')

    @section('header')
    @endsection

    @section('content')
        <div class="main-content">
            <div class="public-content">
                <div class="public-content-inner">
                    <div class="title-container">
                        <h2 class="content-title">Public API</h2>
                    </div>
                    <div class="vertical-card-container">
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
    @endsection
