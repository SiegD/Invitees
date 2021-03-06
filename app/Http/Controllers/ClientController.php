<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_status;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.client.index', [
            'clients' => User::all(),
            'title' => 'Clients'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.client.create', [
            'title' => 'Add Clients',
            'user_status' => user_status::all(),
            'events' => Event::all()
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
            'username' => 'required|max:255|unique:users',
            'name' => 'required|max:255',
            'user_status_id' => 'required|integer',
            'event_regis' => 'integer',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        user::create($validatedData);
        return redirect('/dashboard/users')->with('success', 'New Client has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.client.edit', [
            'clients' => $user,
            'title' => 'Edit client',
            'user_status' => user_status::all(),
            'events' => Event::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'user_status_id' => 'required|integer',
            'event_regis' => 'integer'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }


        $validatedData = $request->validate($rules);

        user::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Client has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        user::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'Client Has been deleted!');
    }
}
