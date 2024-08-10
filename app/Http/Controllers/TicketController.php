<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Event $event)
    {
        return view('pages.tickets.create', [
            'event' => $event
        ]);
    }

    public function store(TicketRequest $request, Event $event)
    {
        $validated = $request->validated();

        if (isset($validated['special_validity'])) {
            if (!isset($validated[$validated['special_validity']])) {
                return redirect()->back()->withErrors([
                    $validated['special_validity'] => 'The ' . $validated['special_validity'] . ' field is required'
                ])->withInput();
            }

            $validated['special_validity'] = json_encode([
                'type' => $validated['special_validity'],
                $validated['special_validity'] => $validated[$validated['special_validity']]
            ]);
        }

        $event->tickets()->create($validated);

        return redirect()->route('events.show', $event)->with('success', 'Ticket created successfully');
    }
}
