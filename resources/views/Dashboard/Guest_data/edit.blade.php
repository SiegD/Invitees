@extends('dashboard.layouts.main')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="card-header">
                Edit Tamu
            </div>
            <div class="card-body">
                <form action="/dashboard/data-tamu/{{ $guest->slug }}" method="POST">
                    @method('put')
                    @csrf
                    <input type="hidden" name="guest_id" value="{{ $guest->id }}">
                    <input type="hidden" name="event_id" value="{{ $guest->event_id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Tamu</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            autofocus required value="{{ $guest->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                            readonly required value="{{ $guest->slug }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="table_name" class="form-label">Nama Meja</label>
                        <input type="text" class="form-control @error('table_name') is-invalid @enderror" id="table_name"
                            name="table_name" required value="{{ $guest->table_name }}">
                        @error('table_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_guest" class="form-label">Jumlah Tamu</label>
                        <input type="text" class="form-control @error('total_guest') is-invalid @enderror" id="total_guest"
                            name="total_guest" required value="{{ $guest->total_guest }}">
                        @error('total_guest')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required value="{{ $guest->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                            id="phone_number" name="phone_number" required value="{{ $guest->phone_number }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <button type="submit" name="action" value="save" class="btn btn-warning">Submit</button>
            </form>
        </div>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/data-tamu/checkSlug?title=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
