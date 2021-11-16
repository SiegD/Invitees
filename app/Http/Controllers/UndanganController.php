<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\guest;

class UndanganController extends Controller
{
    public function show($event_slug, $slug)
    {
        $events = event::where('event_slug', $event_slug)->get()->first();
        $guests = guest::where('slug', $slug)->get()->first();
        if ($events->event_type_id == 1) {
            return view('Undangan.undangannikah', [
                'events' => $events,
                'guests' => $guests
            ]);
        } else {
            return view('Undangan.undanganultah', [
                'events' => $events,
                'guests' => $guests
            ]);
        }
    }
}
