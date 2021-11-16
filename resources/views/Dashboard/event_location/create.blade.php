@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Add new Venue & Location </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/location" method="Post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="venue" class="form-label">Venue name</label>
                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue" name="venue" required
                    autofocus value="{{ old('venue') }}">
                @error('venue')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Venue Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    required autofocus value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lat" class="form-label">Latitude</label>
                <input type="text" class="form-control @error('lat') is-invalid @enderror" id="lat" name="lat" required
                    autofocus value="{{ old('lat') }}">
                @error('latitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lng" class="form-label">Longitude</label>
                <input type="text" class="form-control @error('lng') is-invalid @enderror" id="lng" name="lng" required
                    autofocus value="{{ old('lng') }}">
                @error('lng')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Venue</button>
        </form>
    </div>
@endsection
