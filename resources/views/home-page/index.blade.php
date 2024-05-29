<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sireksi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../template/img/favicon.ico">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('homepage') }}" class="logo d-flex align-items-center me-auto">
        <img src="../template/img/login/lOGO SIREKSI.png" alt="Sireksi" class="Sireksi">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">Beranda</a></li>
          <li><a href="#rekomendasi">Sistem Rekomendasi</a></li>
          <li><a href="#panduan">Panduan</a></li>
          <li><a href="#pengembang">Info Pengembang</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1 class="">Selamat Datang, di Sireksi</h1>
            <p class="">Telusuri Repository Skripsi Ruang Baca Dengan Fitur Rekomendasi</p>
            <div class="d-flex">
                <a href="#rekomendasi" class="btn-get-started">
                  <i class="fas fa-search"></i> Cari Rekomendasi Skripsi
                </a>
              </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-image" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hero-image.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="zoom-in">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>

      </div>

    </section><!-- /Clients Section -->

    <!-- Why Us Section -->
<section id="rekomendasi" class="section rekomendasi" data-builder="section">
    <div class="container-fluid">
      <div class="row gy-4">
        <div class="col-lg-5 order-1 rekomendasi-img">
          <img src="assets/img/rekomend.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
        </div>
        
        <div class="col-lg-7 d-flex flex-column justify-content-center order-2">
          <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
            <h3><span><strong>Sistem Rekomendasi Skripsi</strong></span></h3>
            <p>Ketikkan kata kunci atau keyword yang ada pada form pencarian dibawah ini, lalu klik tombol Cari.</p>
          </div>
  
          <!-- Search Form -->
          <div class="search-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
            <form id="search-form" class="search-form">
              <div class="input-group">
                <input type="text" id="search-input" placeholder="Masukkan kata kunci.." class="form-control" style="width: 75%;" />
                <button type="button" id="search-button" class="btn" style="background-color: #3C096C; color: white;">Cari</button>
              </div>
            </form>
          </div><!-- End Search Form -->
        </div>

      </div>
    </div>
  </section><!-- /Why Us Section -->
  

    <!-- Faq 2 Section -->
    <section id="panduan" class="panduan section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Panduan Pengumpulan Skripsi</h2>
        <p>Sebelum melakukan pengumpulan skripsi, berikut adalah panduan pengumpulan skripsi di Ruang Baca FIP yang harus diperhatikan dengan seksama agar proses pengumpulan berjalan dengan lancar dan tertib.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Pengumpulan skripsi Fakultas Ilmu Pendidikan sekarang dikelola langsung oleh Ruang Baca FIP</h3>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Mahasiswa melakukan pengumpulan langsung ke Ruang Baca dengan menyerahkan Dokumen Fisik Skripsi</h3>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Pengumpulan Skripsi di Ruang Baca dapat diakses melalui aplikasi Sireksi dengan melakukan Login</h3>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Username dan Password yang digunakan untuk login adalah Nomor Induk Mahasiswa (NIM) masing-masing</h3>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Setelah login, pilih Menu Pengumpulan Skripsi, mahasiswa mengisikan data seperti Judul skripsi, Kode Skripsi, tahun terbit, dan Abstrak. Selanjutnya lik simpan data</h3>
              </div><!-- End Faq item-->
              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Selanjutnya mahasiswa menunggu konfirmasi pengumpulan dari Asisten Laboratorium</h3>
              </div><!-- End Faq item-->
              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-check-circle"></i>
                <h3>Setelah pengumpulan skripsi mahasiswa dikonfirmasi oleh Asisten Laboratorium, mahasiswa dapat mengecek detail status pengumpulan di halaman pengumpulan skripsi pada website Sireksi yang diakses</h3>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq 2 Section -->
    <!-- Team Section -->
    <section id="pengembang" class="pengembang section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil Pengembang</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/zulfah.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Zulfah Binti Toyibah</h4>
                <span>Mahasiswa Prodi Pendidikan Informatika NIM 200631100009</span>
                <p>Madiun, Jawa Timur</p>
                <div class="social">
                  <a href="https://www.instagram.com/zulfahbnty_"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/zulfah-binti-toyibah/"> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->
        </div>

      </div>

    </section><!-- /Team Section -->

  </main>

  <footer id="footer" class="footer">



     <!-- Call To Action Section -->
     <section id="call-to-action" class="call-to-action section">
        <img src="assets/img/new.png" alt="">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 box1">
                    <div class="logo m-auto p-3">
                        <div class="col-lg-11 justify-text">
                          <h3>Apa itu Sireksi?</h3>
                            <p>Sireksi adalah sebuah platform untuk memberikan bantuan kepada pengguna, terutama mahasiswa dalam mencari data repository skripsi di Ruang Baca Fakultas Ilmu Pendidikan. Kami menyediakan sistem pencarian berupa rekomendasi data skripsi yang lengkap dan update. </p>
                            <p>Selain itu, sistem ini juga memberikan manfaat kepada asisten laboratorium melalui fitur pengumpulan skripsi secara mandiri oleh mahasiswa sehingga hal ini dapat membantu dalam melakukan pendataan secara cepat dan efisien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 box2">
                    <div class="quick-link m-auto p-3">
                        <h3>Quick Link</h3>
                        <p><a href="#hero">Beranda</a></p>
                        <p><a href="#rekomendasi">Sistem Rekomendasi</a></p>
                        <p><a href="#panduan">Panduan</a></p>
                        <p><a href="#pengembang">Pengembang</a></p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 box3">
                    <div class="contact m-auto p-3">
                        <h3>Contact Us</h3>
                        <p>Jl. Raya Telang, Perumahan Telang Indah, Telang, Kec. Kamal, Kabupaten Bangkalan, Jawa Timur 69162. Laboratorium Sosial Lantai 1</p>
                        <p>ruangbaca.fip.trunojoyo.ac.id</p>
                        <div class="social-links d-flex">
                            <a href="https://www.instagram.com/ruangbaca_fip"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/@ruangbacafiputm6708"><i class="bi bi-youtube"></i></a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
  
      </section><!-- /Call To Action Section -->
  

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Sireksi</strong> <span>By Ruang Baca FIP</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by Zulfah Binti Toyibah</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>