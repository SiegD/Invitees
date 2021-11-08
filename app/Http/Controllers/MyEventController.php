<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_marriage;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    public function index()
    {
        return view('dashboard.my_invitation.index', [
            'events' => Event::where('user_id', auth()->user()->id)->get(),
            'title' => 'My Events'
        ]);
    }

    public function show($slug)
    {
        $event = Event::where('event_slug', $slug)->get()->first();
        return view('dashboard.my_invitation.show', [
            'events' => $event,
            'title' => $event['event_title']
        ]);
    }
}
