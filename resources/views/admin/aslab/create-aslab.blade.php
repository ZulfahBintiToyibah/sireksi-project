@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Tambah Data Asisten Laboratorium</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow mb-4 border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Data Asisten Laboratorium</h6>
                <div class="card-tools">
                    <a href="{{ route('aslab') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card mb-4 border-primary">
                            <div class="card-body">
                                <form action="/insert-aslab" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenkel" class="form-label">Jenis Kelamin</label><br>
                                                <select class="form-control" name="jenkel">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                                            </div>
                                            <div class="mb-5">
                                                <label for="foto" class="form-label text-dark">Masukkan Foto</label>
                                                <input type="file" class="form-control" id="foto" name="foto">
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