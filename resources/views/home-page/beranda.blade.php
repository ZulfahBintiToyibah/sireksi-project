@extends('../home-page/index')

@section('container')
<!-- slider -->
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

@endsection