@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Add new client </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/users" method="Post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Client username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    required autofocus value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Client name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                    autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_status_id" class="form-label">Client status</label>
                <select class="form-select" name="user_status_id" id='showform'>
                    @foreach ($user_status as $status)
                        @if (old('user_status_id') == $status->id)
                            <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                        @else
                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3" id='registration'>

            </div>



            <div class="mb-3">
                <label for="email" class="form-label">Client email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    required autofocus value="{{ old('email') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Client phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                    required autofocus value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required autofocus value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Client</button>
        </form>
    </div>

    <script>
        var registration = document.getElementById("showform");
        var registrationform = document.getElementById("registration");

        var form = `<label for="event_regis" class="form-label">Event Registration</label>       
                 <select class="form-select" name="event_regis">
                    @foreach ($events as $regis)
                        <option value="{{ $regis->id }}">{{ $regis->event_title }}</option>
                    @endforeach
                </select>`

        registration.addEventListener("change", showform);

        document.addEventListener('DOMContentLoaded', showform, false);

        function showform() {
            if (registration.value == 4) {
                registrationform.innerHTML = form;
            } else
                registrationform.innerHTML = '';
        }
    </script>
@endsection
