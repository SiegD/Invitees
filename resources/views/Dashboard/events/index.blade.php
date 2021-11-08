@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> My Client </h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/events/create" class="btn btn-primary mb-3">Add new Event</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Event Type</th>
                    <th scope="col">Event Location</th>
                    <th scope="col">Event Date & Time</th>
                    <th scope="col">Client Email</th>
                    <th scope="col">Client Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->event_title }}</td>
                        <td>{{ $event->user->name }}</td>
                        <td>{{ $event->event_type->name }}</td>
                        <td>{{ $event->event_location->venue }}</td>
                        <td>{{ $event->event_date_time }}</td>
                        <td>{{ $event->user->email }}</td>
                        <td>{{ $event->user->phone }}</td>
                        <td>

                            <a href="/dashboard/events/{{ $event->event_slug }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span></a>

                            <form action="/dashboard/events/{{ $event->event_slug }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure to delete this post?')"><span
                                        data-feather="trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
