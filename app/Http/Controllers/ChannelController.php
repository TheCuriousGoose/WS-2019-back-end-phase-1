<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function create(Event $event)
    {
        return view('pages.channels.create', [
            'event' => $event
        ]);
    }

    public function store(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $event->channels()->create($validatedData);

        return redirect()->route('events.show', $event)->with('success', 'Channel created successfully');
    }
}
