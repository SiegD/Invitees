@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Event Types </h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/event_type/create" class="btn btn-warning mb-3">Create new Event Type</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Event Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event_types as $event_type)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event_type->name }}</td>
                        <td>
                            <a href="/dashboard/event_type/{{ $event_type->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span></a>

                            <form action="/dashboard/event_type/{{ $event_type->id }}" method="post"
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
