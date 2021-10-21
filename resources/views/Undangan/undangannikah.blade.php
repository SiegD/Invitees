<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    <!--UPPERBODY-->
    <div class="fotoawal col-sm-12">
        <img src="/image/client-bg.jpg" alt="">
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
        <div class="row justify-content-center">
            <div class="isi-gl col-sm-5">
                <img class="galeri" src="/image/client.jpg" alt="">
            </div>
            <div class="isi-gl col-sm-6" id="event_detail">
                <h1>Pemberkatan Nikah</h1>
                <p>Senin, 5 Juli 2021</p>
                <p>Pukul 15.00 WITA</p>
                <p>Gereja Katedral</p>
                <p>Jln. Kajaolalido no. 14</p>

                <hr>
                <h1>Resepsi Pernikahan</h1>
                <p>Senin, 5 Juli 2021</p>
                <p>Pukul 19.00 WITA</p>
                <p>Upperhills Convention Hall</p>
                <p>Jln. Metro Tj. Bunga no. 995</p>
            </div>
        </div>
    </div>

    <!--API-->

    <div class="mapresepsi col-lg-12 justify-content-center">
        <div class="bungkusmap">
            <h1 class="mb-3">Lokasi Acara</h1>
            <div class="covermap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.656602456615!2d119.39989891527779!3d-5.158833853562916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d0dca1cf797%3A0x15a4ebc6aa0744fa!2sUpperHills%20Convention%20Hall!5e0!3m2!1sen!2sid!4v1634818309555!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a class="btn btn-map mt-4 btn-success" href="https://goo.gl/maps/nPmkjtjKzKY5XvKw6">Lihat di maps</a>
        </div>
    </div>
    <!--RSVP-->
    <!--Buku tamu-->
    <!--Komen-->
    <!--Footer-->
</body>

</html>
