<?php

namespace App\Http\Controllers;

use App\Models\event_type;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.event_type.index', [
            'event_types' => event_type::all(),
            'title' => 'Event Types'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.event_type.create', [
            'event_types' => event_type::all(),
            'title' => 'New Event Type'
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
            'name' => 'required|max:255|unique:event_types'
        ]);

        event_type::create($validatedData);
        return redirect('/dashboard/event_type')->with('success', 'New Type has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function show(event_type $event_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function edit(event_type $event_type)
    {
        return view('dashboard.event_type.edit', [
            'event_type' => $event_type,
            'title' => 'Edit Event Type'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event_type $event_type)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        event_type::where('id', $event_type->id)
            ->update($validatedData);

        return redirect('/dashboard/event_type')->with('success', 'Event Type has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event_type  $event_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(event_type $event_type)
    {
        event_type::destroy($event_type->id);

        return redirect('/dashboard/event_type')->with('success', 'Event Type Has been deleted!');
    }
}
