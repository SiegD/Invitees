@extends('dashboard.layouts.main')

@php
$event = $events['events'];
if ($event->event_type_id == 1) {
    $event_marriages = $events['event_marriages'];
} else {
    $event_marriages = [];
}
$clients = $events['clients'];
$event_tipes = $events['event_types'];
$event_locations = $events['event_locations'];
$title = $events['title'];
@endphp

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Edit Event </h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/events/{{ $event->id }}" method="Post" class="mb-5" autofocus>
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select class="form-select" name="user_id">

                    @foreach ($clients as $client)
                        @if ($event->User->id == $client->id)
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

                    @foreach ($event_tipes as $event_tipe)
                        @if ($event->Event_type->id == $event_tipe->id)
                            <option value="{{ $event_tipe->id }}" selected>{{ $event_tipe->name }}</option>
                        @else
                            <option value="{{ $event_tipe->id }}">{{ $event_tipe->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="event_location" class="form-label">Event Location</label>
                <select class="form-select" name="event_location_id">
                    @foreach ($event_locations as $event_location)
                        @if ($event->Event_location->id == $event_location->id)
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
                    id="event_date_time" name="event_date_time" required autofocus
                    value="{{ date('Y-m-d\TH:i', strtotime($event->event_date_time)) }}">
                @error('event_date_time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div id="marriageform">
            </div>

            <button type="submit" class="btn btn-primary">Update Client</button>
        </form>
    </div>

    <script>
        var marriage = document.getElementById("showform");
        var marriageformshow = document.getElementById("marriageform");

        var marriageform = `
                <div class="mb-3">
                    <label for="ceremonial_location" class="form-label">Ceremonial Location</label>
                    <select class="form-select" name="ceremonial_location_id">
                        @foreach ($event_locations as $event_location)
                            @if ((isset($event_marriages->ceremonial_location_id) ? $event_marriages->ceremonial_location_id : '') == $event_location->id)
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
                        value="{{ date('Y-m-d\TH:i', strtotime(isset($event_marriages->ceremonial_date_time) ? $event_marriages->ceremonial_date_time : '')) }}">
                    @error('ceremonial_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="groom" class="form-label">Groom</label>
                    <input type="text" class="form-control @error('groom') is-invalid @enderror" id="groom" name="groom"
                        autofocus value="{{ old('groom', isset($event_marriages->groom) ? $event_marriages->groom : '') }}">
                    @error('groom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="groom_father" class="form-label">Groom Father</label>
                    <input type="text" class="form-control @error('groom_father') is-invalid @enderror" id="groom_father"
                        name="groom_father" autofocus value="{{ old('groom_father', isset($event_marriages->groom_father) ? $event_marriages->groom_father : '') }}">
                    @error('groom_father')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="groom_mother" class="form-label">Groom Mother</label>
                    <input type="text" class="form-control @error('groom_mother') is-invalid @enderror" id="groom_mother"
                        name="groom_mother" autofocus value="{{ old('groom_mother', isset($event_marriages->groom_mother) ? $event_marriages->groom_mother : '') }}">
                    @error('groom_mother')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bride" class="form-label">Bride</label>
                    <input type="text" class="form-control @error('bride') is-invalid @enderror" id="bride" name="bride"
                        autofocus value="{{ old('bride', isset($event_marriages->bride) ? $event_marriages->bride : '') }}">
                    @error('bride')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bride_father" class="form-label">Bride Father</label>
                    <input type="text" class="form-control @error('bride_father') is-invalid @enderror" id="bride_father"
                        name="bride_father" autofocus value="{{ old('bride_father', isset($event_marriages->bride_father) ? $event_marriages->bride_father : '') }}">
                    @error('bride_father')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bride_mother" class="form-label">Bride Mother</label>
                    <input type="text" class="form-control @error('bride_mother') is-invalid @enderror" id="bride_mother"
                        name="bride_mother" autofocus value="{{ old('bride_mother', isset($event_marriages->bride_mother) ? $event_marriages->bride_mother : '') }}">
                    @error('bride_mother')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            `









        marriage.addEventListener("change", showform);

        document.addEventListener('DOMContentLoaded', showform, false);

        function showform() {
            if (marriage.value == 1) {
                marriageformshow.innerHTML = marriageform;
            } else
                marriageformshow.innerHTML = '';
        }
    </script>
@endsection
