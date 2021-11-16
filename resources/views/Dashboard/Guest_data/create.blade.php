@extends('dashboard.layouts.main')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Upload_file-tab" data-bs-toggle="tab" data-bs-target="#Upload_file"
                    type="button" role="tab" aria-controls="Upload_file" aria-selected="true">Upload CSV</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Manual_add-tab" data-bs-toggle="tab" data-bs-target="#Manual_add"
                    type="button" role="tab" aria-controls="Manual_add" aria-selected="false">Tambah Tamu</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Upload_file" role="tabpanel" aria-labelledby="Upload_file-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <div class="card">
                                <div class="card-header">
                                    Import File CSV
                                </div>
                                <div class="card-body">
                                    <form action="/dashboard/data-tamu" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="event_id" class="form-label">Event</label>
                                            <select class="form-select" name="event_id">
                                                @foreach ($events as $event)
                                                    @if (old('event_id') == $event->id)
                                                        <option value="{{ $event->id }}" selected>
                                                            {{ $event->event_title }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $event->id }}">{{ $event->event_title }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="file">Choose CSV</label>
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}</div>
                                            @endif

                                            @if (isset($errors) && $errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </div>
                                            @endif
                                            <input type="file" name="file" class="form-control" />
                                        </div>
                                        <button type="submit" name="action" value="import"
                                            class="btn btn-warning">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="Manual_add" role="tabpanel" aria-labelledby="Manual_add-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <div class="card">
                                <div class="card-header">
                                    Tambah Tamu baru
                                </div>
                                <div class="card-body">
                                    <form action="/dashboard/data-tamu" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <div class="mb-3">
                                                <label for="event_id" class="form-label">Event</label>
                                                <select class="form-select" name="event_id">
                                                    @foreach ($events as $event)
                                                        @if (old('event_id') == $event->id)
                                                            <option value="{{ $event->id }}" selected>
                                                                {{ $event->event_title }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $event->id }}">{{ $event->event_title }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Tamu</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" autofocus required value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                    id="slug" name="slug" readonly required value="{{ old('slug') }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="table_name" class="form-label">Nama Meja</label>
                                                <input type="text"
                                                    class="form-control @error('table_name') is-invalid @enderror"
                                                    id="table_name" name="table_name" required
                                                    value="{{ old('table_name') }}">
                                                @error('table_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="total_guest" class="form-label">Jumlah Tamu</label>
                                                <input type="text"
                                                    class="form-control @error('total_guest') is-invalid @enderror"
                                                    id="total_guest" name="total_guest" required
                                                    value="{{ old('total_guest') }}">
                                                @error('total_guest')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" required value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Nomor Telepon</label>
                                                <input type="text"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    id="phone_number" name="phone_number" required
                                                    value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" name="action" value="save"
                                            class="btn btn-warning">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
