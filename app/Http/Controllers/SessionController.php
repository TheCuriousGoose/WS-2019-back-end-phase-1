<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Event;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function edit(Event $event, Session $session)
    {
        return view('pages.sessions.edit',[
            'session' => $session,
            'event' => $event
        ]);
    }

    public function update(Event $event, Session $session, SessionRequest $request)
    {
        $session->update($request->all());
        return redirect()->route('events.show', $event)->with('success', 'Session updated successfully');
    }

    public function create(Event $event)
    {
        return view('pages.sessions.create',[
            'event' => $event
        ]);
    }

    public function store(Event $event, SessionRequest $request)
    {
        $event->sessions()->create($request->all());
        return redirect()->route('events.show', $event)->with('success', 'Session created successfully');
    }
}
