<?php

namespace App\Http\Controllers;

use App\Imports\GuestsImport;
use App\Models\guest;
use App\Models\Event;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->user_status_id === 1) {
            $event = Event::all();
        } else {
            $event = Event::where('user_id', auth()->user()->id)->get();
        };

        return view('dashboard.Guest_data.create', [
            'events' => $event,
            'title' => 'Upload data tamu'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'save':
                $id = $request->event_id;
                $validateddata = $request->validate([
                    'name' => 'required',
                    'slug' => 'required|unique:guests',
                    'table_name' => 'required',
                    'total_guest' => 'required|Integer',
                    'email' => 'required|email:dns',
                    'phone_number' => 'required',
                ]);

                $validateddata['event_id'] = $id;


                guest::create($validateddata);

                return redirect('/dashboard/data-tamu')->with('success', 'New guest Added');
                break;

            case 'import':
                $id = $request->event_id;
                $this->validate($request, [
                    'file' => 'required|mimes:xls,xlsx'
                ]);

                $rules = [
                    '*.event_id' => 'required|integer',
                    '*.name' => 'required|string',
                    '*.table_name' => 'required|string',
                    '*.total_guest' => 'required|integer',
                    '*.email' => 'required|email',
                    '*.phone_number' => 'required'
                ];

                $file = $request->file('file');
                // ->store('Import_data_tamu');

                $imports = (new GuestsImport)->toArray($file);

                foreach ($imports as $import) {
                    $array = $import;
                }

                foreach ($array as $key) {
                    $key['event_id'] = $id;
                    $a[] = $key;
                }


                $validator = Validator::make($a, $rules);
                $validateddata = $validator->validate($rules);

                foreach ($validateddata as $a) {
                    guest::create($a);
                }


                return back()->withStatus('Excel File Imported Succesfully');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(guest $guest, $slug)
    {
        return view('dashboard.Guest_data.edit', [
            'title' => 'Edit Guest',
            'guest' => guest::where('slug', $slug)->get()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guest $guest)
    {
        $rules = [
            'event_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:guests',
            'table_name' => 'required',
            'total_guest' => 'required|Integer',
            'email' => 'required|email:dns',
            'phone_number' => 'required',
        ];

        $validateddata = $request->validate($rules);
        $slug = Event::where('id', $request->event_id)->get('event_slug')->first();
        $event = Event::where('id', $request->event_id)->get()->first();

        guest::where('id', $request->guest_id)->update($validateddata);



        return redirect('dashboard/data-tamu')->with('success', 'Client has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(guest $guest, $guestid)
    {
        guest::where('id', $guestid)->delete();

        return back()->with('success', 'Guest Has been deleted!');
    }

    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(guest::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
