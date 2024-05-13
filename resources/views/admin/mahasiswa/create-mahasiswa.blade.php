@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Tambah Data Pengguna</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow mb-4 border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Data Pengguna</h6>
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
                                            @if(session('error'))
                                                <div class="alert alert-error" style="font-size: 14px;">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <div class="mb-3">
                                                <label for="nim" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                                                <input type="number" class="form-control" id="nim" name="nim">
                                                @error('nim')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                                @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label><br>
                                                <select class="form-control selectpicker" name="role" data-live-search="true">
                                                    <option value="">-- Pilih Role --</option>
                                                    <option value="1">Asisten Laboratorium</option>
                                                    <option value="2">Mahasiswa</option>
                                                </select>
                                                @error('role')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="prodis_id" class="form-label text-dark">Program Studi</label>
                                                <select class="form-control selectpicker" id="prodis_id" name="prodis_id" data-live-search="true">
                                                    <option value="">-- Pilih Program Studi --</option>
                                                    @foreach($mahasiswas as $mahasiswa)
                                                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama_prodi }}</option>
                                                    @endforeach
                                                </select>
                                                @error('prodis_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="no_telp" class="form-label">No Telepon</label>
                                                <input type="number" class="form-control" id="no_telp" name="no_telp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenkel" class="form-label">Jenis Kelamin</label><br>
                                                <select class="form-control" name="jenkel">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-Laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-5">
                                                <label for="foto" class="form-label">Masukkan Foto</label>
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
<script>
    function previewImage(event) {
        console.log("File terpilih:", event.target.files[0]);
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    var fileInput = document.getElementById('foto');
    fileInput.addEventListener('change', previewImage);
</script>



@endsection