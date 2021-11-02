<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_marriage;
use App\Models\event_type;
use App\Models\location;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.events.index', [
            'events' => event::all(),
            'title' => 'Events'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.events.create', [
            'clients' => User::all()->where('user_status_id', 2),
            'event_types' => event_type::all(),
            'event_locations' => location::all(),
            'title' => 'Create Event'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'event_type_id' => 'required',
            'event_location_id' => 'required',
            'event_date_time' => 'required',
            'user_id' => 'required',
        ]);

        $id = Event::create($validatedData)->id;

        if ($request->event_type_id == 1) {
            $validatedData = $request->validate([
                'ceremonial_location_id' => 'required',
                'ceremonial_date_time' => 'required',
                'groom' => 'required',
                'groom_father' => 'required',
                'groom_mother' => 'required',
                'bride' => 'required',
                'bride_father' => 'required',
                'bride_mother' => 'required',
            ]);
        }

        $validatedData['event_id'] = $id;

        Event_marriage::create($validatedData);
        return redirect('/dashboard/events')->with('success', 'New Event has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);

        return redirect('/dashboard/events')->with('success', 'Event Has been deleted!');
    }
}
