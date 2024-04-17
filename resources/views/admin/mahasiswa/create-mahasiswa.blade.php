@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Tambah Data Mahasiswa</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow mb-4 border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Data Mahasiswa</h6>
                <div class="card-tools">
                    <a href="{{ route('mahasiswa') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card mb-4 border-primary">
                            <div class="card-body">
                                <form action="/insert-mahasiswa" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nim" class="form-label">NIM</label>
                                                <input type="number" class="form-control" id="nim" name="nim">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenkel" class="form-label">Jenis Kelamin</label><br>
                                                <select class="form-control" name="jenkel">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="prodis_id" class="form-label text-dark">Program Studi</label>
                                                <select class="form-control" id="prodis_id" name="prodis_id">
                                                    <option value="">-- Pilih Program Studi --</option>
                                                    @foreach($mahasiswas as $mahasiswa)
                                                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama_prodi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="no_telp" class="form-label">No Telepon</label>
                                                <input type="number" class="form-control" id="no_telp" name="no_telp">
                                            </div>
                                            <div class="mb-5">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                                <label class="custom-file-label" for="foto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" name="submit"><i class="fas fa-fw fa-plus"></i> Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 border-primary">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 m-auto">
                                        <div class="text-center">
                                            <img src="template/img/preview/preview.png" class="card-img rounded" id="preview-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection