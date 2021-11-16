<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\guest;
use App\Models\Utterance;

class UndanganController extends Controller
{
    public function show($event_slug, $slug)
    {
        $events = event::where('event_slug', $event_slug)->get()->first();
        $id = $events->id;
        $guests = guest::where('slug', $slug)->get()->first();

        if ($events->event_type_id == 1) {
            return view('Undangan.undangannikah', [
                'events' => $events,
                'guests' => $guests,
                'utterances' => Utterance::latest()->where('event_id', $id)->paginate(5)
            ]);
        } else {
            return view('Undangan.undanganultah', [
                'events' => $events,
                'guests' => $guests,
                'utterances' => Utterance::latest()->where('event_id', $id)->paginate(5)
            ]);
        }
    }

    public function submit(Request $request)
    {
        // dd($request);
        $guestid = $request->guest_id;
        $id = $request->event_id;
        $RSVPrules = [
            'name' => 'required',
            'email' => 'required|email:dns',
            'phone_number' => 'required',
            'RSVP' => 'required|boolean',
        ];

        $Regardsrules = [
            'event_id' => 'required',
            'name' => 'required',
            'regards' => 'required'
        ];

        if ($request->action == 'RSVP') {
            $validateddata = $request->validate($RSVPrules);

            guest::where('id', $guestid)->update($validateddata);

            return back()->with('success', 'Terima kasih atas konfirmasi anda');
        } else {
            $validateddata = $request->validate($Regardsrules);

            Utterance::create($validateddata);

            return back();
        }
    }
}
