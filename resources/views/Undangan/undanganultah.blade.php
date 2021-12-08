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
    <link rel="stylesheet" href="/css/undangan ultah/style.css">
    <title>Invitees - {{ $events->event_title }}</title>


</head>

<body>
    {{-- @dd($events); --}}
    <?php
    $date_alone = date('d M y', strtotime($events->event_date_time));
    $date_alone2 = date('Ymd', strtotime($events->event_date_time));
    $time_alone = date('G:i', strtotime($events->event_date_time));
    $time_alone2 = date('Gis', strtotime($events->event_date_time));
    $url = Request::url();
    $url .= '/confirm=1';
    
    if ($events->cover_img == '') {
        $events->cover_img = 'https://source.unsplash.com/1920x1080?birthday';
    }
    
    if ($events->gal_img == '') {
        $events->gal_img = 'https://source.unsplash.com/720x1280/?birthday';
    }
    ?>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Music --}}
    <audio autoPlay loop>
        <source src="{{ $events->songs }}" type="audio/mpeg">
    </audio>


    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header justify-content-center flex-column">
                    <h6 class="modal-title" id="exampleModalLongTitle">Undangan Ulang Tahun</h6>
                    <h4 class="modal-title" id="exampleModalLongTitle">{{ $events->event_title }}</h4>
                    <p>{{ $date_alone }} | {{ $events->event_location->venue }} | {{ $time_alone }} WITA</p>
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
                    <button type="button" class="btn btn-primary">Unduh</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!--UPPERBODY-->
    <div class="fotoawal col-sm-12 justify-content-center">
        <img src="{{ $events->cover_img }}" alt="">
        <div class="client">
        </div>
    </div>

    <!--UNDANGAN-->
    <div class="salam col-sm-12" id="detailacara">
        <div class="ucapan">
            <p class="pembuka mt-2" style="font-weight: bold">{{ $events->event_title }}</p>
            <div class="infoacara row">
                <div class="isi-gl col-sm-5">
                    <img class="galeri" src="{{ $events->gal_img }}" alt="" style="size: 100%">
                </div>
                <div class="isi-gl col-sm-6">
                    <div class="detailacara">
                        <p>{{ $date_alone }}</p>
                        <p>Pukul {{ $time_alone }} WITA</p>
                        <hr size="5 px">
                        <p>{{ $events->event_location->venue }}</p>
                        <p>{{ $events->event_location->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--API-->
    {{-- Maps --}}
    <div class="mapacara col-lg-12 justify-content-center">
        <div class="bungkusmap">
            <h1 class="mb-3" id="bold">Lokasi Acara</h1>
            <div class="covermap" id="map">
                <iframe src="{{ $events->event_location->googleAPI }}" width="600" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a class="btn btn-map mt-4 btn-success" href="{{ $events->event_location->link }}">Lihat di maps</a>
        </div>
    </div>

    {{-- Timer --}}
    <div class="col-lg-12 justify-content-center">
        <div class="timer">
            <p>Waktu hingga resepsi</p>
            <p id="demo"></p>
            <a class="btn btn-success"
                href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ $events->event_title }}&dates={{ $date_alone2 }}T{{ $time_alone2 }}/{{ $date_alone2 }}T{{ $time_alone2 }}&details=For+details,+link+here:+http://www.example.com&location={{ $events->event_location->venue }}&sf=true&output=xml">
                <i class="bi bi-clock-fill"></i> Atur pengingat</a>
        </div>
    </div>


    <!--RSVP-->
    <div class="col-lg-12">
        <div class="rsvp">
            <div class="rsvp-detail">
                <h1 id="bold">RSVP</h1>
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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email"
                        name="email" placeholder="name@example.com" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number">No. Telp</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                        name="phone_number" placeholder="0821-XXXX-XXXX" required>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="RSVP">Konfirmasi Kehadiran</label>
                    <select class="form-control" id="RSVP" name="RSVP">
                        <option value="1">Saya hadir</option>
                        <option value="0">Saya tidak dapat hadir</option>
                    </select>
                </div>
                <button type="submit" name="action" value="RSVP" class="btn btn-success">Kirim</button>
            </form>
        </div>
    </div>

    <!--Buku tamu-->
    <div class="col-sm-12">
        <div class="buku-tamu">
            <h1 id="bold">Buku Tamu</h1>
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
                    <button type="submit" name="action" value="Regards" class="btn btn-success">Submit</button>
            </form>
        </div>


        <!--Komen-->
        <div class="kolomkomen col-lg-12 justify-content-center">
            <div class="row justify-content-center">
                {{-- @dd($utterances) --}}
                @if ($utterances->count())
                    @foreach ($utterances as $utterance)
                        <div class="komen mb-4">
                            <h4 id="bold">{{ $utterance->name }}</h4>
                            <p>{{ $utterance->regards }}</p>
                        </div>
                    @endforeach
                @else
                    <p style="text-align: center">No comment yet</p>
                @endif
            </div>
        </div>
        {{-- pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $utterances->links() }}
        </div>
    </div>

    <!--Footer-->
    <div class="footer justify-content-center ">
        <div class="col-lg-12">
            <div class="row">
                <div class="logo col-lg-6 mb-3 ">
                    <img src="/image/logo 2.png" alt="">
                </div>


                <div class="kontak col-lg-6 mb-3" style="text-align: center">
                    <h1 id="bold">Contact us :</h1>
                    <p>Invitees.Exanimo@gmail.com</p>
                    <p>0821 XXXX XXXX</p>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    // Set the date we're counting down to
    var datetime = {!! json_encode($events->event_date_time, JSON_HEX_TAG) !!}
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
