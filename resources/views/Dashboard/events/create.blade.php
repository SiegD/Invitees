@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Add new Event & Client </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/events" method="Post" class="mb-5" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="event_title" class="form-label">Event Name</label>
                <input type="text" class="form-control @error('event_title') is-invalid @enderror" id="event_title"
                    name="event_title" autofocus required value="{{ old('event_title') }}">
                @error('event_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="event_slug" class="form-label">Event Slug</label>
                <input type="text" class="form-control @error('event_slug') is-invalid @enderror" id="event_slug"
                    name="event_slug" readonly required value="{{ old('event_slug') }}">
                @error('event_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select class="form-select" name="user_id">
                    @foreach ($clients as $client)
                        @if (old('client_id') == $client->id)
                            <option value="{{ $client->id }}" selected>{{ $client->name }}</option>
                        @else
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="event_type" class="form-label">Event Type</label>
                <select class="form-select" name="event_type_id" id="showform">
                    @foreach ($event_types as $event_type)
                        @if (old('event_type_id') == $event_type->id)
                            <option value="{{ $event_type->id }}" selected>{{ $event_type->name }}</option>
                        @else
                            <option value="{{ $event_type->id }}">{{ $event_type->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="event_location" class="form-label">Event Location</label>
                <select class="form-select" name="event_location_id">
                    @foreach ($event_locations as $event_location)
                        @if (old('event_location_id') == $event_location->id)
                            <option value="{{ $event_location->id }}" selected>{{ $event_location->venue }}</option>
                        @else
                            <option value="{{ $event_location->id }}">{{ $event_location->venue }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="event_date_time" class="form-label">Event Date & Time</label>
                <input type="datetime-local" class="form-control @error('event_date_time') is-invalid @enderror"
                    id="event_date_time" name="event_date_time" required autofocus value="{{ old('event_date_time') }}">
                @error('event_date_time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Hidden --}}
            <div id="marriageform">
                <div class="mb-3">
                    <label for="ceremonial_location" class="form-label">Ceremonial Location</label>
                    <select class="form-select" name="ceremonial_location_id">
                        @foreach ($event_locations as $event_location)
                            @if (old('ceremonial_location_id') == $event_location->id)
                                <option value="{{ $event_location->id }}" selected>{{ $event_location->venue }}
                                </option>
                            @else
                                <option value="{{ $event_location->id }}">{{ $event_location->venue }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ceremonial_date_time" class="form-label">Ceremonial Date & Time</label>
                    <input type="datetime-local" class="form-control @error('ceremonial_date_time') is-invalid @enderror"
                        id="ceremonial_date_time" name="ceremonial_date_time" autofocus
                        value="{{ old('ceremonial_date_time') }}">
                    @error('ceremonial_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="groom" class="form-label">Groom</label>
                    <input type="text" class="form-control @error('groom') is-invalid @enderror" id="groom" name="groom"
                        autofocus value="{{ old('groom') }}">
                    @error('groom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="groom_father" class="form-label">Groom Father</label>
                    <input type="text" class="form-control @error('groom_father') is-invalid @enderror" id="groom_father"
                        name="groom_father" autofocus value="{{ old('groom_father') }}">
                    @error('groom_father')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="groom_mother" class="form-label">Groom Mother</label>
                    <input type="text" class="form-control @error('groom_mother') is-invalid @enderror" id="groom_mother"
                        name="groom_mother" autofocus value="{{ old('groom_mother') }}">
                    @error('groom_mother')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bride" class="form-label">Bride</label>
                    <input type="text" class="form-control @error('bride') is-invalid @enderror" id="bride" name="bride"
                        autofocus value="{{ old('bride') }}">
                    @error('bride')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bride_father" class="form-label">Bride Father</label>
                    <input type="text" class="form-control @error('bride_father') is-invalid @enderror" id="bride_father"
                        name="bride_father" autofocus value="{{ old('bride_father') }}">
                    @error('bride_father')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bride_mother" class="form-label">Bride Mother</label>
                    <input type="text" class="form-control @error('bride_mother') is-invalid @enderror" id="bride_mother"
                        name="bride_mother" autofocus value="{{ old('bride_mother') }}">
                    @error('bride_mother')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="cover_img" class="form-label">Cover Image</label>
                <img class="img-preview1 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('cover_img') is-invalid @enderror" type="file" id="cover_img"
                    name="cover_img" onchange="previewImage()">
                @error('cover_img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gal_img" class="form-label">Galery Image</label>
                <img class="img-preview2 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('gal_img') is-invalid @enderror" type="file" id="gal_img" name="gal_img"
                    onchange="previewImage2()">
                @error('gal_img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>

    <script>
        var marriage = document.getElementById("showform");
        marriage.addEventListener("change", showform);

        function showform() {
            if (marriage.value == 1) {
                $('#marriageform').show();
                $('#ceremonial_date_time').required = true;
                $('#groom').required = true;
                $('#groom_father').required = true;
                $('#groom_mother').required = true;
                $('#bride').required = true;
                $('#bride_father').required = true;
                $('#bride_mother').required = true;
            } else {
                $('#marriageform').hide();
            }
        }

        const event_title = document.querySelector('#event_title');
        const event_slug = document.querySelector('#event_slug');

        event_title.addEventListener('change', function() {
            fetch('/dashboard/events/checkSlug?title=' + event_title.value)
                .then(response => response.json())
                .then(data => event_slug.value = data.slug)
        });

        function previewImage() {
            const image = document.querySelector('#cover_img');
            const imgPreview = document.querySelector('.img-preview1');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImage2() {
            const image2 = document.querySelector('#gal_img');
            const imgPreview2 = document.querySelector('.img-preview2');
            imgPreview2.style.display = 'block';

            const oFReader2 = new FileReader();
            oFReader2.readAsDataURL(image2.files[0]);

            oFReader2.onload = function(oFREvent) {
                imgPreview2.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
