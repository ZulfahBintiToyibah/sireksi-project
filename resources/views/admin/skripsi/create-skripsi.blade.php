@extends('../layouts/app')

@section('container')

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Tambah Data Skripsi</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Data Skripsi</h6>
                    <div class="card-tools">
                        <a href="{{ route('skripsi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-body">
                                    <form action="/insert-skripsi" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="judul" class="form-label text-dark">Judul Skripsi</label>
                                                    <input type="text" class="form-control" id="judul" name="judul" autocomplete="off">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label text-dark">Nama Penulis</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="pengarang" class="form-label text-dark">Pengarang</label>
                                                            <input type="text" class="form-control" id="pengarang" name="pengarang" autocomplete="off">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="prodis_id" class="form-label text-dark">Program Studi</label>
                                                            <select class="form-control" id="prodis_id" name="prodis_id">
                                                                <option value="">-- Pilih Program Studi --</option>
                                                                @foreach($skripsis as $skripsi)
                                                                    <option value="{{ $skripsi->mahasiswa->prodi->id }}">{{ $skripsi->mahasiswa->prodi->nama_prodi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="datepicker-year" class="form-label text-dark">Tahun Terbit</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="tahun_terbit" id="datepicker-year" autocomplete="off" value="">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="jumlah_halaman" class="form-label text-dark">Jumlah Halaman</label>
                                                    <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah_buku" class="form-label text-dark">Jumlah Buku</label>
                                                    <input type="jumlah_buku" class="form-control" id="jumlah_buku" name="jumlah_buku" autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rak" class="form-label text-dark">Rak</label><br>
                                                    <select class="form-control selectpicker" name="rak" id="rak" data-live-search="true">
                                                        <option value="0">-- Pilih Rak --</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="sinopsis" class="form-label text-dark">Sinopsis</label>
                                                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="12" style="resize: none;" autocomplete="off"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>

</div>

@endsection