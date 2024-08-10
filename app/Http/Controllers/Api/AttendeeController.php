<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'lastname' => 'required',
            'registration_code' => 'required',
        ]);

        $attendee = Attendee::query()
            ->where('lastname', $validated['lastname'])
            ->where('registration_code', $validated['registration_code'])
            ->first();

        if ($attendee) {
            $attendee->update([
                'login_token' => md5($attendee->firstname)
            ]);

            $attendee->refresh();
            $attendee->tokem = $attendee->login_token;

            return response()->json($attendee);
        }
    }

    public function logout(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required',
        ]);

        $attendee = Attendee::query()
            ->where('login_token', $validated['token'])
            ->first();

        if ($attendee) {
            $attendee->update([
                'login_token' => null
            ]);

            return response()->json([
                'message' => 'Logout success'
            ]);
        }
    }
}
