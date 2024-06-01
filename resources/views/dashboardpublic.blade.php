@extends('layout')

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
            <div class="title-container">
                <h2 class="content-title">Public API</h2>
            </div>
            <div class="vertical-card-container">

                <div class="vertical-card">
                    <h3>Vertical Card 1</h3>
                    <p>More detailed description for vertical card one. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 2</h3>
                    <p>More detailed description for vertical card two. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 3</h3>
                    <p>More detailed description for vertical card three. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 4</h3>
                    <p>More detailed description for vertical card three. You can put even more information here.</p>
                </div>
                <div class="vertical-card">
                    <h3>Vertical Card 5</h3>
                    <p>More detailed description for vertical card three. You can put even more information here.</p>
                </div>
            </div>
        </div>
    </div>

