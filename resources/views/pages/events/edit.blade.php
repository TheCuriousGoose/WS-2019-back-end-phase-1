@extends('layouts.app')

@section('content')
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }}</h1>
        </div>
    </div>

    <form class="needs-validation" action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputName">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
                    value="{{ $event->name }}" name="name">
                @error('name')
                    <div class=" invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputSlug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"" id="inputSlug" placeholder="" value="{{ $event->slug }}"
                    name="slug">
                @error('slug')
                    <div class="  invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror"" id="inputDate" placeholder="yyyy-mm-dd"
                    value="{{ $event->date->format('Y-m-d') }}" name="date">
                @error('date')
                    <div class=" invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{{ route('events.show', $event) }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
