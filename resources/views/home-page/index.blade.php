<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sireksi</title>

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../template/img/favicon.ico">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../template/img/favicon.ico">

<!-- Bootstrap -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Style Beranda -->
<link href="../dist/css/style.css" rel="stylesheet">

<!-- Style Populer -->
<link href="../dist/css/populer.css" rel="stylesheet">

<!-- Style Tentang -->
<link href="../dist/css/tentang.css" rel="stylesheet">

<!-- Style Kategori Buku -->
<link href="../dist/css/kategori-buku.css" rel="stylesheet">

<!-- Style Detail Buku -->
<link href="../dist/css/detail-buku.css" rel="stylesheet">

<!-- Style Team -->
<link href="../dist/css/team.css" rel="stylesheet">

<style>
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{ display: none; }
</style>

<!-- navbar -->
<nav class="navbar sticky-top fixed-top navbar-expand-lg nav-bg" style="z-index: 1000;">    
    <div class="container">
        <a class="navbar-brand" href="{{ route('beranda') }}">
            <img src="../template/img/login/lOGO SIREKSI.png" alt="uLibrary" class="logo-ulibrary">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-list" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('beranda') }}" style="color: white;">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#tentangsatu" style="color: white;">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentangsatu-new" style="color: white;">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?include=team" style="color: white;">Rekomendasi Skripsi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sign-in" type="button">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section id="slider">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="../dist/img/slider/bg-1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../dist/img/slider/bg-2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../dist/img/slider/bg-3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section id="tentangsatu">
    <div class="containerdua mx-auto">
        <div class="kedua mx-auto">
            <h2>Apa itu Sireksi?</h2>
        </div>
    </div>
    <div class="ketiga mx-auto">
        <p>Sireksi adalah sebuah platform yang didesain khusus untuk memberikan bantuan kepada pengguna, terutama mahasiswa dalam mencari data repository skripsi di Ruang Baca. Kami menyediakan sistem pencarian berupa rekomendasi data skripsi yang lengkap dan update dengan menyertakan kode skripsi sesuai dengan letak raknya, sehingga mempercepat proses penelusuran informasi skripsi. Selain itu, sistem ini juga memberikan manfaat kepada asisten laboratorium melalui fitur pengumpulan skripsi secara mandiri oleh mahasiswa sehingga hal ini dapat membantu dalam melakukan pendataan secara cepat dan efisien.</p>
    </div>
</section>

<section id="tentangdua">
    <div class="containertiga mx-auto">
        <div class="keempat mx-auto">
            <h1>Visi</h1>
        </div>
    </div>
    <div class="kelima mx-auto">
        <p>Menjadi pusat informasi yang terdepan dalam menyediakan akses terhadap repository skripsi yang terorganisir dengan baik, 
            menjadi pendorong utama bagi kemajuan akademik di kalangan mahasiswa</p>
    </div>
</section>

<section id="tentangtiga">
    <div class="containerempat mx-auto">
        <div class="keenam mx-auto">
            <h1>Misi</h1>
        </div>
    </div>
    <div class="ketujuh mx-auto">
        <p></p>
        <ul>
            <li>Menyediakan layanan berbasis digital</li>
            <li>Menyediakan akses mudah dan cepat terhadap koleksi skripsi yang komprehensif dan terupdate.</li>
            <li>Berkomitmen untuk terus berinovasi dan berkolaborasi dengan institusi pendidikan dan peneliti untuk meningkatkan kualitas layanan dan aksesibilitas informasi akademik.</li>
        </ul>
    </div>
</section>

{{-- <!-- after-kategori-buku -->
<section id="after-kategori-buku">
    <div class="container">
        <div class="col-12">
            <p>"Libraries answer questions you didn't <br>even know you had!"</p>
        </div>
    </div>
</section> --}}

<section id="tentangsatu-new">
    <div class="containerdua mx-auto">
        <div class="kedua-new mx-auto">
            <h2>Apa itu Sireksi?</h2>
        </div>
    </div>
    <div class="ketiga mx-auto">
        <p>Sireksi adalah sebuah platform yang didesain khusus untuk memberikan bantuan kepada pengguna, terutama mahasiswa dalam mencari data repository skripsi di Ruang Baca. Kami menyediakan sistem pencarian berupa rekomendasi data skripsi yang lengkap dan update dengan menyertakan kode skripsi sesuai dengan letak raknya, sehingga mempercepat proses penelusuran informasi skripsi. Selain itu, sistem ini juga memberikan manfaat kepada asisten laboratorium melalui fitur pengumpulan skripsi secara mandiri oleh mahasiswa sehingga hal ini dapat membantu dalam melakukan pendataan secara cepat dan efisien.</p>
    </div>
</section>

<section id="tentangsatu-new">
    <div class="containerdua mx-auto">
        <div class="kedua-new mx-auto">
            <h2>Apa itu Sireksi?</h2>
        </div>
    </div>
    <div class="ketiga mx-auto">
        <p>Sireksi adalah sebuah platform yang didesain khusus untuk memberikan bantuan kepada pengguna, terutama mahasiswa dalam mencari data repository skripsi di Ruang Baca. Kami menyediakan sistem pencarian berupa rekomendasi data skripsi yang lengkap dan update dengan menyertakan kode skripsi sesuai dengan letak raknya, sehingga mempercepat proses penelusuran informasi skripsi. Selain itu, sistem ini juga memberikan manfaat kepada asisten laboratorium melalui fitur pengumpulan skripsi secara mandiri oleh mahasiswa sehingga hal ini dapat membantu dalam melakukan pendataan secara cepat dan efisien.</p>
    </div>
</section>



<!-- before-footer -->
<section id="before-footer" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 box1">
                <div class="logo m-auto p-3">
                    <img src="../template/img/login/lOGO SIREKSI.png" class="mt-3 mb-3" alt="uLibrary Logo">
                    <div class="col-lg-10">
                        <p>Sireksi memudahkan para mahasiswa dalam mencari referensi data skripsi secara digital di Ruang Baca. Dengan adanya Sireksi diharapkan dapat memunculkan inspirasi baru dalam pengembangan penelitian selanjutnya.</p>
                    <p>Sireksi disertai fitur pengumpulan mandiri sehingga dapat membantu proses pendataan oleh asisten laboratorium secara cepat dan efisien di Ruang Baca</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 box2">
                <div class="quick-link m-auto p-3">
                    <h3>Quick Link</h3>
                    <p><a href="{{ route('beranda') }}">Beranda</a></p>
                    <p><a href="">Informasi</a></p>
                    <p><a href="">Team</a></p>
                </div>
            </div>
            <div class="col-12 col-lg-4 box3">
                <div class="contact m-auto p-3">
                    <h3>Contact Us</h3>
                    <p>Jl. Raya Telang, Perumahan Telang Inda, Telang, Kec. Kamal, Kabupaten Bangkalan, Jawa Timur 69162</p>
                    <p>Laboratorium Sosial Lt.1</p>
                    <p>ruangbaca.fip.trunojoyo.ac.id</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<footer>
    <p class="copyright">&copy; Copyright Sireksi by Ruang Baca FIP</p>
</footer>

<!-- Bootstrap -->
<script src="../dist/js/bootstrap.min.js"></script>
<script src="../dist/js/bootstrap.bundle.min.js"></script>

<!-- JQuery -->
<script src="../template/vendor/jquery/jquery.min.js"></script>

</script>

