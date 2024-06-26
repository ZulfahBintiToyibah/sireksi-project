@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Edit Skripsi</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Skripsi</h6>
                <div class="card-tools">
                    <a href="{{ route('skripsi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4 shadow border-primary">
                            <div class="card-body">
                                <form action="/update-skripsi/{{ $skripsis->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="judul" class="form-label text-dark">Judul Skripsi</label>
                                                <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="{{ $skripsis->judul }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="hidden" class="form-control" name="mahasiswa_id" value="{{ $skripsis->mahasiswas->nama }}" readonly>
                                                        <label for="nama">Nama Mahasiswa</label>
                                                        <input type="text" class="form-control" id="nama" value="{{ $skripsis->mahasiswas->nama }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nama">NIM Mahasiswa</label>
                                                        <input type="text" class="form-control" id="nama" value="{{ $skripsis->mahasiswas->nim }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="dosens_id" class="form-label text-dark">Dosen Pembimbing</label><br>
                                                        <select class="form-control selectpicker" name="dosens_id" id="dosens_id" data-live-search="true">
                                                            @foreach($dosens as $dosen)
                                                                <option value="{{ $dosen->id }}" {{ $dosen->id == $skripsis->dosens_id ? 'selected' : '' }}>{{ $dosen->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama">Program Studi</label>
                                                        <input type="text" class="form-control" id="nama" value="{{ $skripsis->mahasiswas->prodis->nama_prodi }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="abstrak" class="form-label text-dark">Abstrak (Dalam Bahasa Indonesia)</label>
                                                <textarea class="form-control" id="abstrak" name="abstrak" rows="10" style="resize: none;" autocomplete="off">{{ $skripsis->abstrak }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="kodeskripsis_id" class="form-label text-dark">Kode Skripsi</label><br>
                                                <select class="form-control selectpicker" name="kodeskripsis_id" id="kodeskripsis_id" data-live-search="true">
                                                    @foreach($kodeskripsis as $kodeskripsi)
                                                        <option value="{{ $kodeskripsi->id }}" {{ $kodeskripsi->id == $skripsis->kodeskripsis_id ? 'selected' : '' }}>{{ $kodeskripsi->kode_skripsi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="datepicker-year" class="form-label text-dark">Tahun Terbit</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="tahun" id="datepicker-year" autocomplete="off" value="{{ $skripsis->tahun }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-save"></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection