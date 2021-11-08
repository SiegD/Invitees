@extends('dashboard.layouts.main')
@section('container')

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Event_detail-tab" data-bs-toggle="tab" data-bs-target="#Event_detail"
                    type="button" role="tab" aria-controls="Event_detail" aria-selected="true">Event Detail</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Guests-tab" data-bs-toggle="tab" data-bs-target="#Guests" type="button"
                    role="tab" aria-controls="Guests" aria-selected="false">Guests</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Utterances-tab" data-bs-toggle="tab" data-bs-target="#Utterances"
                    type="button" role="tab" aria-controls="Utterances" aria-selected="false">Utterances</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Event_detail" role="tabpanel" aria-labelledby="Event_detail-tab">

                <div class="table-responsive mt-4">
                    <table class="table">
                        <tr>
                            <th>Nama Event</th>
                            <th style="font-weight : normal">{{ $events->event_title }}</th>
                        </tr>
                        <tr>
                            <th>Tipe Event</th>
                            <th style="font-weight : normal">{{ $events->event_type->name }}</th>
                        </tr>
                        <tr>
                            <th>Lokasi Event</th>
                            <th style="font-weight : normal">{{ $events->event_location->venue }}</th>
                        </tr>
                        <tr>
                            <th>Alamat Lokasi</th>
                            <th style="font-weight : normal">{{ $events->event_location->address }}</th>
                        </tr>
                        <tr>
                            <th>Waktu Event</th>
                            <th style="font-weight : normal">{{ $events->event_date_time }}</th>
                        </tr>

                        @if ($events->event_type_id == 1){
                            <tr>
                                <th>Lokasi Pernikahan</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->ceremonial_location->venue }}
                                </th>
                            </tr>
                            <tr>
                                <th>Alamat Pernikahan</th>
                                <th style="font-weight : normal">
                                    {{ $events->Event_marriage->ceremonial_location->address }}
                                </th>
                            </tr>
                            <tr>
                                <th>Waktu Pernikahan</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->ceremonial_date_time }}
                                </th>
                            </tr>
                            <tr>
                                <th>Pengantin Pria</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->groom }}
                                </th>
                            </tr>
                            <tr>
                                <th>Ayah Pengantin Pria</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->groom_father }}
                                </th>
                            </tr>
                            <tr>
                                <th>Ibu Pengantin Pria</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->groom_mother }}
                                </th>
                            </tr>
                            <tr>
                                <th>Pengantin Wanita</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->bride }}
                                </th>
                            </tr>
                            <tr>
                                <th>Ayah Pengantin Wanita</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->bride_father }}
                                </th>
                            </tr>
                            <tr>
                                <th>Ibu Pengantin Wanita</th>
                                <th style="font-weight : normal">{{ $events->Event_marriage->bride_mother }}
                                </th>
                            </tr>
                            }
                        @endif
                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="Guests" role="tabpanel" aria-labelledby="Guests-tab">

            </div>


            <div class="tab-pane fade" id="Utterances" role="tabpanel" aria-labelledby="Utterances-tab">...</div>
        </div>
    </div>
@endsection
