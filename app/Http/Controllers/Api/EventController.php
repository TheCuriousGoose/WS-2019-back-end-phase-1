<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function show(Organizer $organizer, Event $event)
    {
        $event->load('channels.rooms.sessions', 'tickets');

        return response()->json($event);
    }

    public function register(Request $request, Organizer $organizer, Event $event)
    {

        if($request->has('token')){
            $user = Attendee::where('token', $request->input('token'))->first();
        }

        if (!$user) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        if ($user->registrations()->where('event_id', $event->id)->exists()) {
            return response()->json(['message' => 'User already registered'], 401);
        }

        $ticketId = $request->input('ticket_id');
        $sessionIds = $request->input('session_ids', []);

        if (!$event->tickets()->where('id', $ticketId)->where('available', '>', 0)->exists()) {
            return response()->json(['message' => 'Ticket is no longer available'], 401);
        }

        $registration = $user->registrations()->create([
            'event_id' => $event->id,
            'ticket_id' => $ticketId,
        ]);

        $registration->sessions()->attach($sessionIds);

        return response()->json(['message' => 'Registration successful'], 200);
    }
}
