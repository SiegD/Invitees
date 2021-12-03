@extends('Dashboard.layouts.main')

@section('container')

    @if (session()->has('failed'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('failed') }}
        </div>
    @endif


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Edit Profile </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/profile/{{ $user->id }}" method="post" class="mb-5"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    required autofocus value="{{ old('username', $user->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Client name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                    autofocus value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Client email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    required autofocus value="{{ old('email', $user->email) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Client phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                    required autofocus value="{{ old('phone', $user->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required autofocus>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Re-Enter password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" required autofocus>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <button class="btn btn-warning" href="/dashboard">Back</button>
        </form>
    </div>
@endsection
