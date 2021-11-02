<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.event_location.index', [
            'locations' => location::all(),
            'title' => 'Event Venue & Location'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.event_location.create', [
            'title' => 'Add New Venue & Location'
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
            'venue' => 'required|max:255|unique:locations',
            'address' => 'required|max:255'
        ]);

        location::create($validatedData);
        return redirect('/dashboard/location')->with('success', 'New Type has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(location $location)
    {
        return view('dashboard.event_location.edit', [
            'locations' => $location,
            'title' => 'Edit Venue & Location'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, location $location)
    {
        $rules = [
            'venue' => 'required|max:255|unique:locations',
            'address' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        location::where('id', $location->id)
            ->update($validatedData);

        return redirect('/dashboard/location')->with('success', 'Venue has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        location::destroy($location->id);

        return redirect('/dashboard/location')->with('success', 'Venue Has been deleted!');
    }
}
