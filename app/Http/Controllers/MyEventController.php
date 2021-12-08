<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_marriage;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_status_id === 1) {
            $client = Event::all();
        } else if (auth()->user()->user_status_id === 4) {
            $client = Event::where('id', auth()->user()->event_regis)->get();
        } else {
            $client = Event::where('user_id', auth()->user()->id)->get();
        };

        return view('dashboard.my_invitation.index', [
            'events' => $client,
            'title' => 'My Events'
        ]);
    }

    public function show($slug)
    {
        $event = Event::where('event_slug', $slug)->get()->first();

        if ($event != null) {
            if (auth()->user()->id == $event->user_id or auth()->user()->user_status_id == 1) {
                return view('dashboard.my_invitation.show', [
                    'events' => $event,
                    'title' => $event['event_title']
                ]);
            } else if (auth()->user()->user_status_id == 4) {
                $event = Event::where('id', auth()->user()->event_regis)->get()->first();
                return view('dashboard.my_invitation.show', [
                    'events' => $event,
                    'title' => $event['event_title']
                ]);
            } else {
                return redirect('dashboard/undanganku');
            };
        } else {
            return redirect('/dashboard');
        }
    }
}
