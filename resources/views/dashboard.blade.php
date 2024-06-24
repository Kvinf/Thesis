@extends('layout')

@section('header')
@endsection

@section('content')
    <div class="main-content">
        <aside class="private-content">
            <div class="title-container" style="margin-bottom: 10px ">
                <h2 class="content-title private-title" >Your Projects</h2>
            </div>
            <div class="card-container">
                <button class="title-button" data-toggle="modal" data-target="#exampleModal">+ Project</button>
                <div class="card-item">
                @foreach ($items as $item)
                    <a class="card" href="{{ route('project', ['id' => $item->id]) }}">
                        {{ $item->projectName }}
                    </a>
                @endforeach
                </div>

            </div>
        </aside>
        <div class="public-content" style="align-items: flex-start">
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #222831 ">
                <form action="{{ route('addproject') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel" style="color:#f4f4f4; font-weight:bold; font-size : 25px">Create a new project</h1>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label label-item">Project Name :</label>
                            <input type="text" class="form-control label-input" id="name" name="name" style=" border: 2px solid #333; background-color: transparent; color : #f4f4f4">
                        </div>
                        <label for="message-text" class="col-form-label label-item">Status:</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="private" value="1"
                                class="custom-control-input">
                            <label class="custom-control-label label-item" for="customRadioInline1">Private</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="private" value="0"
                                class="custom-control-input">
                            <label class="custom-control-label label-item" for="customRadioInline2">Public</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label label-item">Description:</label>
                            <textarea class="form-control  label-input" id="message-text" name="description"  style=" border: 2px solid #333;background-color: transparent; color : #f4f4f4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="custom-button close-button" data-dismiss="modal">Close</button>
                        <button type="submit" class="custom-button submit-button" type="submit">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
