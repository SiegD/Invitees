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
    <title>Invitees - Startup yang terpaksa dan demi nilai</title>


</head>

<body>
    <!--Overlay-->
    {{-- <div class="overlay" onclick="off()" id="overlay">
        <div class="guest col-sm-8 ">
            <div class="overlay-salam row-sm-8 justify-content-center">
                <p>Undangan pernikahan</p>
                <h1>Gilbert & Anna</h1>
                <p>5 July | Upperhills Convention Hall | 19.00</p>
            </div>

            <div class="overlay-data row">
                <div class="barcode col-sm-6">
                    <img src="/image/qrcode.jpeg" alt="">
                </div>
                <div class="data col-sm-6">
                    <p>Kepada Yth.</p>
                    <h1>Julia W. & Keluarga</h1>
                    <p>Meja : Amarylis</p>
                    <p>Berlaku untuk : 2 Orang</p>
                    <p>Kami mengundang Bapak/Ibu/Saudara/i untuk hadir di acara kami. Mohon Screeenshot halaman ini atau
                        klik unduh dan tunjukkan saat proses registrasi</p>
                </div>
            </div>
            
            <div class="button row">
                <button>Unduh</button>
                <button onclick="off()">Tutup</button>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header justify-content-center flex-column">
                    <h6 class="modal-title" id="exampleModalLongTitle">Undangan Pernikahan</h6>
                    <h4 class="modal-title" id="exampleModalLongTitle">Gilber & Anna</h4>
                    <p>5 July | Upperhills Convention Hall | 19.00</p>
                </div>

                <div class="modal-body">
                    <div class="data row justify-content-center">
                        <div class="barcode col-6">
                            <img src="/image/qrcode.jpeg" alt="">
                        </div>
                        <div class="data-tamu col-6">
                            <p>Kepada Yth.</p>
                            <h1 class="mb-3">Julia W. & Keluarga</h1>
                            <p class="mb-0">Meja : Amarylis</p>
                            <p>Berlaku untuk : 2 Orang</p>
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
        <img src="/image/client1.png" alt="">
        <div class="client">
            <h1>Gilbert & Anna</h1>
            <p>5 Juli 2021 | Upperhills Convetion Hall</p>
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
            <p class="nama-pengantin mt-3">Gilbert Schunger</p>
            <p>Putra pertama dari Bpk. John Schunger dan Ibu Mariah Utami</p>
            <i class="love bi bi-suit-heart-fill"></i>
            <p class="nama-pengantin">Anna Kusuma</p>
            <p>Putra pertama dari Bpk. Bayu Kusuma dan Ibu Windy Gracia</p>
        </div>
    </div>

    {{-- Galeri and events location --}}
    <div class="col-lg-12">
        <div class="infoacara row">
            <div class="isi-gl col-sm-5">
                <img class="galeri" src="/image/client.jpg" alt="">
            </div>
            <div class="isi-gl col-sm-6">
                <div class="detailacara">
                    <p class="judul">Pemberkatan Nikah</p>
                    <p>Senin, 5 Juli 2021</p>
                    <p>Pukul 15.00 WITA</p>
                    <p>Gereja Katedral</p>
                    <p>Jln. Kajaolalido no. 14</p>
                    <hr>
                    <p class="judul">Resepsi Pernikahan</p>
                    <p>Senin, 5 Juli 2021</p>
                    <p>Pukul 19.00 WITA</p>
                    <p>Upperhills Convention Hall</p>
                    <p>Jln. Metro Tj. Bunga no. 995</p>
                </div>
            </div>
        </div>
    </div>

    <!--API-->
    {{-- Maps --}}
    <div class="mapresepsi col-lg-12 justify-content-center">
        <div class="bungkusmap">
            <h1 class="mb-3" id="bold">Lokasi Acara</h1>
            <div class="covermap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.656602456615!2d119.39989891527779!3d-5.158833853562916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d0dca1cf797%3A0x15a4ebc6aa0744fa!2sUpperHills%20Convention%20Hall!5e0!3m2!1sen!2sid!4v1634818309555!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a class="btn btn-map mt-4 btn-success" href="https://goo.gl/maps/nPmkjtjKzKY5XvKw6">Lihat di maps</a>
        </div>
    </div>

    {{-- Timer --}}
    <div class="col-lg-12 justify-content-center">
        <div class="timer">
            <p>Waktu hingga resepsi</p>
            <p id="demo"></p>
            <a class="btn btn-success" href="#"> <i class="bi bi-clock-fill"></i> Atur pengingat</a>
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
            <form>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="phone_number">No. Telp</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="confimation">Konfirmasi Kehadiran</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Saya hadir</option>
                        <option>Saya tidak dapat hadir</option>
                    </select>
                </div>
            </form>
            <a class="btn btn-success" href="">Kirim</a>
        </div>
    </div>

    <!--Buku tamu-->
    <div class="col-sm-12">
        <div class="buku-tamu">
            <h1 id="bold">Buku Tamu</h1>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    <!--Komen-->
    <div class="kolomkomen col-lg-12 justify-content-center">
        <div class="row">
            <div class="komen mb-4">
                <h4 id="bold">Name</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam expedita necessitatibus nihil magnam,
                    ex
                    maxime porro. Libero voluptates veritatis nulla?</p>
            </div>

            <div class="komen mb-4">
                <h4>Name</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam expedita necessitatibus nihil magnam,
                    ex
                    maxime porro. Libero voluptates veritatis nulla?</p>
            </div>

            <div class="komen">
                <h4>Name</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam expedita necessitatibus nihil magnam,
                    ex
                    maxime porro. Libero voluptates veritatis nulla?</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{-- {{ $posts->links() }} --}} <p>
            <1>
        </p>
    </div>

    <!--Footer-->
    <div class="footer justify-content-center ">
        <div class="col-lg-12">
            <div class="row">
                <div class="logo col-lg-6 mb-3 ">
                    <img src="/image/logo.png" alt="">
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
    var countDownDate = new Date("Nov 11, 2021 15:37:25").getTime();

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

<script>
    function off() {
        document.getElementById("overlay").style.display = "none";
    }
</script>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#overlay').modal('show');
    });
</script>

</html>
