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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@700&display=swap" rel="stylesheet">

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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@700&family=Poetsen+One&family=Poppins:wght@600&display=swap" rel="stylesheet">

<!-- navbar -->
<nav class="navbar sticky-top fixed-top navbar-expand-lg nav-bg" style="z-index: 1000;">    
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="../template/img/login/lOGO SIREKSI.png" alt="uLibrary" class="logo-ulibrary">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-list" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}" style="color: white;">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#tentangsatu" style="color: white;">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentangsatu-new" style="color: white;">Panduan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sign-in" type="button">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-md-left">
      <h1 class="text-white" data-aos="fade-up">Selamat Datang, di Sireksi</h1>
      <br>
      <div class="row">
        <div class="col-7" style="text-align: justify">
        </div>
        <div class="col-7" style="text-align: justify">
          <p>"Telusuri Repository Skripsi dengan Fitur Rekomendasi"
          </p>
        </div>
      </div>
      <br>
      <div class="row">
      <form action="hasil.php" method="post">
        <div class="col-5" style="text-align: justify">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="kata" id="nama" aria-describedby="basic-addon2" style="border-color: #5F68AE; ">
              <button class="btn btn-primary pt-1" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </section><!-- End Hero -->
  
<section id="tentangsatu">
    <div class="containerdua mx-auto">
        <div class="kedua mx-auto">
            <h2>Apa itu Sireksi?</h2>
        </div>
    </div>
    <div class="ketiga mx-auto">
        <p>Sireksi adalah sebuah platform yang didesain khusus untuk memberikan bantuan kepada pengguna, terutama mahasiswa dalam mencari data repository skripsi di Ruang Baca Fakultas Ilmu Pendidikan. Kami menyediakan sistem pencarian berupa rekomendasi data skripsi yang lengkap dan update dengan menyertakan kode skripsi sesuai dengan letak raknya, sehingga mempercepat proses penelusuran informasi skripsi. Selain itu, sistem ini juga memberikan manfaat kepada asisten laboratorium melalui fitur pengumpulan skripsi secara mandiri oleh mahasiswa sehingga hal ini dapat membantu dalam melakukan pendataan secara cepat dan efisien.</p>
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
{{-- beda --}}
<section id="tentangsatu-new">
    <div class="containerdua mx-auto">
        <div class="kedua-new mx-auto">
            <h2>Pengumpulan Skripsi</h2>
        </div>
    </div>
    <div class="ketiga-new mx-auto">
        <ul>
            <li>Pengumpulan skripsi Fakultas Ilmu Pendidikan sekarang dikelola langsung oleh Ruang Baca FIP.</li>
            <li>Mahasiswa melakukan pengumpulan langsung ke Ruang Baca dengan menyerahkan Dokumen Fisik Skripsi.</li>
            <li>Pengumpulan Skripsi di Ruang Baca dapat diakses melalui aplikasi Sireksi dengan melakukan Login.</li>
            <li>Username dan Password yang digunakan untuk login adalah Nomor Induk Mahasiswa (NIM) masing-masing.</li>
            <li>Pilih Menu Pengumpulan Skripsi, mahasiswa mengisikan data seperti Judul skripsi, Kode Skripsi, tahun terbit, dan Abstrak</li>
            <li>Klik simpan data.</li>
            <li>Selanjutnya mahasiswa menunggu konfirmasi pengumpulan dari Asisten Laboratorium.</li>
            <li>Setelah pengumpulan skripsi mahasiswa dikonfirmasi oleh Asisten Laboratorium, mahasiswa dapat mengecek status pengumpulan di halaman dashboard pada website Sireksi yang diakses.</li>
        </ul>
    </div>
    
</section>

<!-- before-footer -->
<section id="before-footer" style="margin-top: 0px;">
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
                    <p><a href="{{ route('homepage') }}">Beranda</a></p>
                    <p><a href="#tentangsatu">Tentang</a></p>
                    <p><a href="#tentangsatu-new">Panduan</a></p>
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
    <p class="copyright">&copy; Copyright Sireksi by Ruang Baca FIP 2024</p>
</footer>

<!-- Bootstrap -->
<script src="../dist/js/bootstrap.min.js"></script>
<script src="../dist/js/bootstrap.bundle.min.js"></script>

<!-- JQuery -->
<script src="../template/vendor/jquery/jquery.min.js"></script>

</script>

