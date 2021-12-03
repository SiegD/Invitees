@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> My Client </h1>
    </div>

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Event Title</th>
                    <th scope="col">Event Type</th>
                    <th scope="col">Event Location</th>
                    <th scope="col">Event Date & Time</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Diupdate</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->event_title }}</td>
                        <td>{{ $event->event_type->name }}</td>
                        <td>{{ $event->event_location->venue }}</td>
                        <td>{{ $event->event_date_time }}</td>
                        <td>{{ $event->created_at }}</td>
                        <td>{{ $event->user->updated_at }}</td>
                        <td>

                            <a href="/dashboard/undanganku/{{ $event->event_slug }}" class="badge bg-info">
                                <span data-feather="eye"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
