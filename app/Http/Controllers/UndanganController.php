<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\guest;
use App\Models\Utterance;
use Illuminate\Http\Request;

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

    public function barcode($event_slug, $guest, $confirm)
    {

        $status = auth()->user();
        $event = Event::where('event_slug', $event_slug)->get()->first();
        // dd($event_slug, $guest, $confirm, $status->event_regis, $event->id);

        if ($status->user_status->status == 'guest') {
            return redirect('/dashboard')->with('failed', 'You are not a client yet');
        } else if ($status->user_status->status == 'client') {
            if ($status->id == $event->user_id) {
                $validate['confirmation'] = 1;
                $guest_data = Guest::where('slug', $guest)->first();
                if ($guest_data != null) {
                    Guest::where('slug', $guest)->update($validate);
                    return redirect('/dashboard')->with('success', 'Guest ' . $guest . ' Attendance Confirm');
                } else {
                    return redirect('/dashboard')->with('failed', 'Guest ' . $guest . ' Tidak ada');
                }
            } else if ($status->id != $event->user_id) {
                return redirect('/dashboard')->with('failed', 'This is not your event');
            }
        } else if ($status->user_status->status == 'registration') {
            if ($status->event_regis == $event->id) {
                $validate['confirmation'] = 1;
                $guest_data = Guest::where('slug', $guest)->first();
                if ($guest_data != null) {
                    Guest::where('slug', $guest)->update($validate);
                    return redirect('/dashboard')->with('success', 'Guest ' . $guest . ' Attendance Confirm');
                } else {
                    return redirect('/dashboard')->with('failed', 'Guest ' . $guest . ' Tidak ada');
                }
            } else {
                return redirect('/dashboard')->with('failed', 'This is not your event');
            }
        } else if ($status->user_status->status == 'admin') {
            $validate['confirmation'] = 1;
            $guest_data = Guest::where('slug', $guest)->first();
            if ($guest_data != null) {
                Guest::where('slug', $guest)->update($validate);
                return redirect('/dashboard')->with('success', 'Guest ' . $guest . ' Attendance Confirm');
            } else {
                return redirect('/dashboard')->with('failed', 'Guest ' . $guest . ' Tidak ada');
            }
        } else {
            return redirect('/dashboard')->with('failed', 'You are not a client yet');
        };
    }
}
