@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Manage Events</h2>
            <div>
                <a class="btn btn-outline-primary" href="{{ route('events.create') }}">
                    Create new event
                </a>
            </div>

        </div>
        <hr>
    </div>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100">
                            <a class="fw-bold fs-5">{{ $event->name }}</a>
                        </div>
                        <span>{{ $event->date->format('M d, Y') }}</span>
                        <hr>
                        <span>{{ $event->getAmountOfRegistrations() }} registrations</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
