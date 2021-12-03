@extends('Dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Edit Venue </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/location/{{ $locations->id }}" method="post" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue" name="venue" required
                    autofocus value="{{ old('venue', $locations->venue) }}">
                @error('venue')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    required autofocus value="{{ old('address', $locations->address) }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="googleAPI" class="form-label">Google API</label>
                <textarea rows="3" class="form-control @error('googleAPI') is-invalid @enderror" id="googleAPI"
                    name="googleAPI" required autofocus>{{ $locations->googleAPI }}</textarea>
                @error('googleAPI')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" required
                    autofocus value="{{ old('link', $locations->link) }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
