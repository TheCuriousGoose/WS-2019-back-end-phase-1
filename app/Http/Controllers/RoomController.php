<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create(Event $event)
    {
        $event->load('channels');

        return view('pages.rooms.create', [
            'event' => $event
        ]);
    }

    public function store(RoomRequest $request, Event $event)
    {
        Room::create($request->validated());

        return redirect()->route('events.show', $event)->with('success', 'Room created successfully');
    }
}
