<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Auth::user()->events;

        $events->load('tickets.registrations');

        return view('pages.events.index', [
            'events' => $events
        ]);
    }

    public function show(Event $event)
    {
        $event->load(['tickets.registrations', 'channels.rooms.sessions']);

        return view('pages.events.show', [
            'event' => $event
        ]);
    }

    public function create()
    {
        return view('pages.events.create');
    }

    public function store(EventRequest $request)
    {
        $event = Auth::user()->events()->create($request->validated());

        return redirect()->route('events.show', $event)->with('success', 'Event successfully created');
    }

    public function edit(Event $event)
    {
        return view('pages.events.edit', [
            'event' => $event
        ]);
    }

    public function update(Event $event, EventRequest $request)
    {
        $event->update($request->validated());

        return redirect()->route('events.show', $event)->with('success', 'Event successfully updated');
    }
}
