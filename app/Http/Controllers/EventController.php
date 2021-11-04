<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_marriage;
use App\Models\event_type;
use App\Models\location;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Event::with(['User'])->get();

        return view('Dashboard.events.index', [
            'events' => $client,
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
            $validatedData['event_id'] = $id;

            Event_marriage::create($validatedData);
        }

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
        $return = [
            'events' => $event,
            'clients' => User::all()->where('user_status_id', 2),
            'event_types' => event_type::all(),
            'event_locations' => location::all(),
            'title' => 'Edit event'
        ];

        if ($event->Event_type->id == 1) {
            $return['event_marriages'] = $event->Event_marriage;
        }

        return view('Dashboard.events.edit', ['events' => $return]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, Event_marriage $event_marriage)
    {

        $rules = [
            'event_type_id' => 'required|',
            'event_location_id' => 'required',
            'event_date_time' => 'required|Date',
            'user_id' => 'required',
        ];

        if ($request->event_type_id == 1) {
            $rulesmarriage = [
                'ceremonial_location_id' => 'required',
                'ceremonial_date_time' => 'required|Date',
                'groom' => 'required',
                'groom_father' => 'required',
                'groom_mother' => 'required',
                'bride' => 'required',
                'bride_father' => 'required',
                'bride_mother' => 'required',
            ];
        }

        if ($request->event_type_id != $event->event_type_id) {

            if ($event->event_type_id == 1) {
                Event_marriage::destroy($event->event_marriage->id);
                $validatedData = $request->validate($rules);
                Event::where('id', $event->id)->update($validatedData);
            } else {

                $validatedData = $request->validate($rules);
                $id = $event->id;
                Event::where('id', $event->id)->update($validatedData);
                $validatedData = $request->validate($rulesmarriage);
                $validatedData['event_id'] = $id;
                Event_marriage::create($validatedData);
            }
        } else {
            if ($event->event_type_id == 1) {
                $validatedData = $request->validate($rules);
                $id = $event->id;
                Event::where('id', $event->id)->update($validatedData);
                $validatedData = $request->validate($rulesmarriage);
                $validatedData['event_id'] = $id;
                Event_marriage::where('id', $event->event_marriage->id)->update($validatedData);
            } else {
                $validatedData = $request->validate($rules);
                Event::where('id', $event->id)->update($validatedData);
            }
        }

        return redirect('/dashboard/events')->with('success', 'New Event has been added!');
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
