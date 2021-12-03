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

                        @if ($events->event_type_id == 1)
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
                        @endif
                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="Guests" role="tabpanel" aria-labelledby="Guests-tab">

                <div class="table-responsive col-lg-8 mt-4">
                    <a href="/dashboard/data-tamu" class="btn btn-warning mb-3">Add guests</a>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Meja</th>
                                <th scope="col">Total Tamu</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">RSVP</th>
                                <th scope="col">Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events->guest as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->table_name }}</td>
                                    <td>{{ $event->total_guest }}</td>
                                    <td>{{ $event->email }}</td>
                                    <td>{{ $event->phone_number }}</td>
                                    <td>{{ $event->RSVP }}</td>
                                    <td>{{ $event->confirmation }}</td>
                                    <td>

                                        <a href="/undangan/{{ $events->event_slug }}/{{ $event->slug }}"
                                            class="badge bg-info">
                                            <span data-feather="eye"></span></a>

                                        <input type="hidden"
                                            value="www.invitees.com/undanganku/{{ $events->event_slug }}/{{ $event->slug }}"
                                            id="link">

                                        <button class="badge bg-success" onclick="myFunction()" style="border : none;">
                                            <span data-feather="clipboard"></span></button>

                                        <a href="/dashboard/data-tamu/{{ $event->slug }}/edit" class="badge bg-warning">
                                            <span data-feather="edit"></span></a>

                                        <form action="/dashboard/data-tamu/{{ $event->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Are you sure to delete this post?')"><span
                                                    data-feather="trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="tab-pane fade" id="Utterances" role="tabpanel" aria-labelledby="Utterances-tab">
                <div class="table-responsive col-lg-8 mt-4">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Regards</th>
                                <th scope="col">Created at</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events->utterance as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->regards }}</td>
                                    <td>{{ $event->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("link").value;

            console.log(copyText);
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText);

            /* Alert the copied text */
            alert("Copied the text: " + copyText);
        }
    </script>
@endsection
