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
                <label for="googleAPI" class="form-label">Google API</label>
                <textarea class="form-control @error('googleAPI') is-invalid @enderror" id="googleAPI" name="googleAPI"
                    required autofocus></textarea>
                @error('googleAPI')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Venue link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" required
                    autofocus value="{{ old('link') }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Venue</button>
        </form>
    </div>
@endsection
