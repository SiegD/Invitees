<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Boostrap JS --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{-- Boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/undangan/style.css">
    <title>Invitees - {{ $events->event_title }}</title>
    <link rel="icon" href="/image/logo.png" type="image/x-icon">

</head>

<body>
    <?php
    $date_alone = date('d M y', strtotime($events->event_date_time));
    $date_alone2 = date('d M y', strtotime($events->event_marriage->ceremonial_date_time));
    $date_alone3 = date('Ymd', strtotime($events->event_marriage->ceremonial_date_time));
    $time_alone = date('G:i', strtotime($events->event_date_time));
    $time_alone2 = date('G:i', strtotime($events->event_marriage->ceremonial_date_time));
    $time_alone3 = date('Gis', strtotime($events->event_marriage->ceremonial_date_time));
    $url = Request::url();
    $url .= '/confirm=1';
    ?>

    {{-- Music --}}
    <audio autoPlay loop>
        <source src="/songs/Can You Feel The Love Tonight Cover  FULL AUDIO.mp3" type="audio/mpeg">
    </audio>

    {{-- Overlay --}}

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header justify-content-center flex-column">
                    <h6 class="modal-title" id="exampleModalLongTitle">Undangan Pernikahan</h6>
                    <h4 class="modal-title" id="exampleModalLongTitle">{{ $events->event_marriage->groom }} &
                        {{ $events->event_marriage->bride }}</h4>
                    <p> {{ $date_alone2 }} |
                        {{ $events->event_marriage->ceremonial_location->venue }}</p>
                </div>

                <div class="modal-body">
                    <div class="data row justify-content-center">
                        <div class="barcode col-6 justify-content-center">
                            {!! QrCode::size(300)->generate($url) !!}
                        </div>
                        <div class="data-tamu col-6">
                            <p>Kepada Yth.</p>
                            <h1 class="mb-3">{{ $guests->name }} & Keluarga</h1>
                            <p class="mb-0">Meja : {{ $guests->table_name }}</p>
                            <p>Berlaku untuk : {{ $guests->total_guest }} Orang</p>
                            <p>Kami mengundang Bapak/Ibu/Saudara/i untuk hadir di acara kami. Mohon Screeenshot halaman
                                ini atau
                                klik unduh dan tunjukkan saat proses registrasi</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-warning">Unduh</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--UPPERBODY-->
    <div class="fotoawal col-sm-12 justify-content-center">
        <img src="/image/client1.png" alt="">
        <div class="client">
            <h1>{{ $events->event_marriage->groom }} & {{ $events->event_marriage->bride }}</h1>
            <p> {{ $date_alone2 }}
                | {{ $events->event_marriage->ceremonial_location->venue }}</p>
        </div>
    </div>

    <!--UNDANGAN-->
    <div class="salam col-sm-12">
        <div class="ucapan">
            <p class="pembuka">Dengan kerendahan hati serta dengan ungkapan syukur atas karunia Tuhan, Kami
                mengundang
                Bapak/Ibu/Saudara/i
                untuk
                berbagi kebahagiaan atas bersatunya putra-putri kami </p>
            {{-- <hr> --}}
            <p class="nama-pengantin mt-3">{{ $events->event_marriage->groom }}</p>
            <p>Putra pertama dari Bpk. {{ $events->event_marriage->groom_father }} dan Ibu
                {{ $events->event_marriage->groom_mother }}</p>
            <i class="love bi bi-suit-heart-fill"></i>
            <p class="nama-pengantin">{{ $events->event_marriage->bride }}</p>
            <p>Putra pertama dari Bpk. {{ $events->event_marriage->bride_father }} dan Ibu
                {{ $events->event_marriage->bride_mother }}</p>
        </div>
    </div>

    {{-- Galeri and events location --}}
    <div class="col-lg-12" style="padding: 2%">
        <div class="infoacara row">
            <div class="isi-gl col-sm-5">
                <img class="galeri" src="/image/client.jpg" alt="">
            </div>
            <div class="isi-gl col-sm-6">
                <div class="detailacara">
                    <p class="judul">Pemberkatan Nikah</p>
                    <p>{{ $date_alone }}</p>
                    <p>Pukul {{ $time_alone }} WITA</p>
                    <p>{{ $events->event_location->venue }}</p>
                    <p>{{ $events->event_location->address }}</p>
                    <hr>
                    <p class="judul">Resepsi Pernikahan</p>
                    <p>{{ $date_alone2 }}</p>
                    <p>Pukul {{ $time_alone2 }} WITA</p>
                    <p>{{ $events->event_marriage->ceremonial_location->venue }}</p>
                    <p>{{ $events->event_marriage->ceremonial_location->address }}</p>
                </div>
            </div>
        </div>
    </div>

    <!--API-->
    {{-- Maps --}}
    <div class="mapresepsi col-lg-12 justify-content-center">
        <div class="bungkusmap">
            <h1 class="mb-3" id="bold" style="color: #DDB373">Lokasi Acara</h1>
            <div class="covermap" id="map">
                <iframe src="{{ $events->event_marriage->ceremonial_location->googleAPI }}" width="600" height="450"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a class="btn btn-map mt-3 mb-2" href="https://goo.gl/maps/nPmkjtjKzKY5XvKw6"
                style="color: white; background-color:#DDB373">Lihat di maps</a>
        </div>
    </div>

    {{-- Timer --}}
    <div class="col-lg-12 justify-content-center">
        <div class="timer">
            <p style="color: #DDB373" id="bold">Waktu hingga resepsi</p>
            <p id="demo"></p>
            <a class="btn mb-2" style="background-color: #DDB373; color:white;"
                href="https://www.google.com/calendar/render?action=TEMPLATE&text=Pernikahan+{{ $events->event_marriage->groom }}+dan+{{ $events->event_marriage->bride }}&dates={{ $date_alone3 }}T{{ $time_alone3 }}/{{ $date_alone3 }}T{{ $time_alone3 }}&details=For+details,+link+here:+http://www.example.com&location={{ $events->event_marriage->ceremonial_location->venue }}&sf=true&output=xml">
                <i class="bi bi-clock-fill"></i> Atur pengingat</a>
        </div>
    </div>


    <!--RSVP-->
    <div class="col-lg-12">
        <div class="rsvp">
            <div class="rsvp-detail">
                <h1 id="bold" style="color: #DDB373">RSVP</h1>
                <p>Tanpa mengurangi rasa hormat, kami mengharapkan anda untuk mengisi RSVP di bawah ini. Konfirmasi ini
                    sangat
                    penting sehubungan dengan Protokol Kesehatan untuk penggunaan kapasitas ballroom yang harus
                    dimaksimalkan.
            </div>
            <form action="/undangan/{{ $events->event_slug }}/{{ $guests->slug }}" method="POST">
                @csrf
                <input type="hidden" id="event_id" name="guest_id" value="{{ $guests->id }}">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="name" class="form-control" id="name" name="name" readonly
                        value="{{ $guests->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Name@example.com" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number">No. Telp</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                        name="phone_number" placeholder="No. Telp" required>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="RSVP">Konfirmasi Kehadiran</label>
                    <select class="form-control" name="RSVP" id="RSVP">
                        <option value="1">Saya hadir</option>
                        <option value="0">Saya tidak dapat hadir</option>
                    </select>
                </div>
                <button type="submit" name="action" value="RSVP" class="btn mb-2 mt-2"
                    style="color: white; background-color:#DDB373;">Kirim</button>
            </form>
        </div>
    </div>

    <!--Buku tamu & komen-->
    <div class="col-sm-12">
        <div class="buku-tamu">
            <h1 id="bold" style="color: #DDB373">Utterances</h1>
            <form action="/undangan/{{ $events->event_slug }}/{{ $guests->slug }}" method="POST">
                @csrf
                <input type="hidden" id="event_id" name="event_id" value="{{ $events->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="regards" class="form-label">Ucapan</label>
                    <textarea class="form-control" id="regards" name="regards" rows="5"></textarea>
                </div>
                <div class="btn-holder mt-4 mb-5" style="text-align: center">
                    <button type="submit" name="action" value="Regards" class="btn"
                        style="background-color: #DDB373; color:white">Submit</button>
                </div>
            </form>

            <!--Komen-->
            <div class="kolomkomen col-lg-12 justify-content-center">
                <div class="row justify-content-center">
                    {{-- @dd($utterances) --}}
                    @if ($utterances->count())
                        @foreach ($utterances as $utterance)
                            <div class="komen mb-4">
                                <h4 id="bold" style="color: #DDB373">{{ $utterance->name }}</h4>
                                <p>{{ $utterance->regards }}</p>
                            </div>
                        @endforeach
                    @else
                        <p style="text-align: center">No utterance yet</p>
                    @endif
                </div>
            </div>
            {{-- pagination --}}
            <div class="d-flex justify-content-center mt-5">
                {{ $utterances->links() }}
            </div>
        </div>
    </div>


    <!--Footer-->
    <div class="footer justify-content-center ">
        <div class="col-lg-12">
            <div class="row mt-5">
                <div class="logo col-lg-6 mb-3 ">
                    <img src="/image/logo 2.png" alt="">
                </div>


                <div class="kontak col-lg-6 mb-3 mt-3" style="text-align: center">
                    <h1 id="bold" class="mb-3">Contact us :</h1>
                    <p class="mb-1">Invitees.Exanimo@gmail.com</p>
                    <p>0821 XXXX XXXX</p>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    // Set the date we're counting down to
    var datetime = {!! json_encode($events->event_marriage->ceremonial_date_time, JSON_HEX_TAG) !!}
    var countDownDate = new Date(datetime).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#overlay').modal('show');
    });
</script>

</html>
