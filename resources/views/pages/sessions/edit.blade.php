@extends('layouts.app')

@section('content')
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }}</h1>
        </div>
        <span class="h6">{{ $event->date->format('F d, Y') }}</span>
    </div>

    <div class="mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h2 class="h4">Edit session</h2>
        </div>
    </div>

    <form class="needs-validation" novalidate
        action="{{ route('events.sessions.update', ['event' => $event, 'session' => $session]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectType">Type</label>
                <select class="form-control" id="selectType" name="type">
                    <option value="talk" @selected($session->type == 'talk')>Talk</option>
                    <option value="workshop" @selected($session->type == 'workshop')>Workshop</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputTitle">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle"
                    name="title" placeholder="" value="{{ $session->title }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputSpeaker">Speaker</label>
                <input type="text" class="form-control @error('speaker') is-invalid @enderror" id="inputSpeaker"
                    name="speaker" placeholder="" value="{{ $session->speaker }}">
                @error('speaker')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectRoom">Room</label>
                <select class="form-select @error('room_id') is-invalid @enderror" id="selectRoom" name="room_id">
                    @foreach ($event->channels as $channel)
                        @foreach ($channel->rooms as $room)
                            <option value="{{ $room->id }}" @selected($session->room->id == $room->id)>{{ $channel->name }} /
                                {{ $room->name }}</option>
                        @endforeach
                    @endforeach
                </select>
                @error('room_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputCost">Cost</label>
                <input type="number" class="form-control" id="inputCost" name="cost" placeholder=""
                    value="{{ $session->cost }}">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 mb-3">
                <label for="inputStart">Start</label>
                <input type="text" class="form-control" id="inputStart" name="start" placeholder="yyyy-mm-dd HH:MM"
                    value="{{ $session->start }}">
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <label for="inputEnd">End</label>
                <input type="text" class="form-control" id="inputEnd" name="end" placeholder="yyyy-mm-dd HH:MM"
                    value="{{ $session->end }}">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="textareaDescription">Description</label>
                <textarea class="form-control" id="textareaDescription" name="description" placeholder="" rows="5">{{ $session->description }}</textarea>
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save session</button>
        <a href="{{ route('events.show', $event) }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
