@extends('Dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Edit Event type </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/event_type/{{ $event_type->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Event Type</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                    autofocus value="{{ old('name', $event_type->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
