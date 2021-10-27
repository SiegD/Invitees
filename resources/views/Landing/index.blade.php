@extends('Landing.Layouts.main')
@section('container')

    {{-- Caraousel --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/image/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/image/3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Features --}}
    <div class="container" id="features">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="judul">Features</h2>
                <p class="mb-1">Berikut adalah fitur-fitur yang dapat kamu nikmati jika menggunakan undangan
                    digital Invitees</p>
                <p class="text-muted mt-1 mb-5">*Beberapa fitur hanya tersedia untuk paket tertentu</p>
            </div>
        </div>


        <div class="row justify-content-evenly mx-5" id="content">
            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Template.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Template Beragam</p>
                <p class="fdetail">Pilihan template dengan tema beragam yang sesuai dengan kebutuhanmu
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Buku Tamu.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Buku Tamu</p>
                <p class="fdetail">Buku tamu yang diisi dengan doa dan ucapan selamat dari para tamu undangan
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/RSVP.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">RSVP</p>
                <p class="fdetail">Konfirmasi kehadiran tamu yang diundang melalui fitur ini
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Lokasi Waktu.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Lokasi dan Waktu Acara</p>
                <p class="fdetail">Lokasi acara yang terintegrasi dengan Google Maps dan informasi acara (tanggal dan
                    waktu)
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Pengingat.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Pengingat Acara</p>
                <p class="fdetail">Kirim pengingat untuk para tamu undangan agar hadir di acaramu
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Galeri.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Galeri Foto</p>
                <p class="fdetail">Unggah foto-foto berkesan yang dapat dilihat oleh tamu undanganmu
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Musik.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Musik</p>
                <p class="fdetail">Bagikan perasaanmu melalui musik yang dimainkan saat website diakses
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Angpao.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Angpao Online</p>
                <p class="fdetail">Tamu undangan dapat membagikan angpao secara online (cashless)
                </p>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center">
                <img src="/image/icon/Live.png" alt="">
                <p class="mb-1 text" style="font-weight:bold;">Live Streaming</p>
                <p class="fdetail">Tamu undangan yang berhalangan hadir dapat menyaksikan live streaming dari acaramu
                </p>
            </div>
        </div>
    </div>

    <hr>

    {{-- Price --}}
    <div class="container" id="price">
        <div class="row">
            <div class="col-sm-12 text-center mt-3">
                <h2 class="judul">Harga</h2>
                <p class="fdetail mt-3 mb-5">Pilih paket terbaik yang sesuai dengan kebutuhanmu dan dapatkan fitur-fitur
                    menarik untuk undangan digitalmu!</p>
            </div>
        </div>

        <div class="row justify-content-evenly mx-5" id="content">
            <div class="col-sm-4 col-sm-offset-5 text-center" id="tabelharga">
                <div class="harga">
                    <div class="jenis-harga" id="jh1">
                        <h4>Paket 1 : Standar</h5>
                            <h6>Rp. 150.000</h6>
                    </div>
                    <ul>
                        <li>Pilihan template standar</li>
                        <li>Fitur lokasi dan waktu acara</li>
                        <li>Fitur pengingat acara</li>
                        <li>Fitur buku tamu</li>
                        <li>Fitur RSVP</li>
                        <li>Fitur galeri foto (max. 5 foto)</li>
                    </ul>
                </div>
                <button class="btn">Pilih Paket ini</button>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center" id="tabelharga">
                <div class="harga">
                    <div class="jenis-harga" id="jh2">
                        <h4>Paket 2 : Plus</h5>
                            <h6>Rp. 200.000</h6>
                    </div>
                    <ul>
                        <li>Pilihan semua template</li>
                        <li>Fitur lokasi dan waktu acara</li>
                        <li>Fitur pengingat acara</li>
                        <li>Fitur buku tamu</li>
                        <li>Fitur RSVP</li>
                        <li>Fitur galeri foto (max. 20 foto)</li>
                        <li>Fitur musik</li>
                    </ul>
                </div>
                <button class="btn">Pilih Paket ini</button>
            </div>

            <div class="col-sm-4 col-sm-offset-5 text-center" id="tabelharga">
                <div class="harga">
                    <div class="jenis-harga" id="jh3">
                        <h4>Paket 3 : Premium</h5>
                            <h6>Rp. 250.000</h6>
                    </div>
                    <ul>
                        <li>Pilihan semua template</li>
                        <li>Fitur lokasi dan waktu acara</li>
                        <li>Fitur pengingat acara</li>
                        <li>Fitur buku tamu</li>
                        <li>Fitur RSVP</li>
                        <li>Fitur galeri foto (max. 20 foto)</li>
                        <li>Fitur musik</li>
                        <li>Fitur angpao online</li>
                        <li>Fitur live streaming</li>
                    </ul>
                </div>
                <button class="btn">Pilih Paket ini</button>
            </div>
        </div>
    </div>

    <hr>

    {{-- Contact Us --}}
    <div class="container" id="contact">
        <div class="row ">
            <div class="col-sm-12 text-center mt-3">
                <h2 class="judul">Contact</h2>
                <p class="fdetail mt-3 mb-5"> Hubungi kami melalui kontak yang ada dibawah ini</p>
            </div>
        </div>

        {{-- mail --}}
        <div class="row sm-12 justify-content-evenly">
            <div class="col-sm-4 mb-4">
                <div class="row justify-content-evenly" id="content2">

                    <div class="img col-sm-4 my-auto justify-content-center">
                        <img src="/image/icon/mail.png" alt="">
                    </div>

                    <div class="col-sm-6 col-sm-offset-2 " id="kontak">
                        <p class="mb-1" style="font-weight:bold;">Email</p>
                        <p>Invitees@gmail.com</p>
                    </div>
                </div>

            </div>

            {{-- telp --}}
            <div class="col-sm-4">
                <div class="row justify-content-evenly" id="content2">

                    <div class="img col-sm-3 my-auto justify-content-center">
                        <img src="/image/icon/telephone.png" alt="">
                    </div>

                    <div class="col-sm-6 col-sm-offset-2" id="kontak">
                        <p class="mb-1" style="font-weight:bold;">Phone</p>
                        <p>0821 XXXX XXXX</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
