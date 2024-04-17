@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Edit Program Studi</h1>

<div class="row">
    <div class="col-lg-8">
        <!-- Default Card Example -->
        <div class="card shadow mb-4 border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Program Studi</h6>
                <div class="card-tools">
                    <a href="{{ route('prodi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-4 shadow border-primary">
                    <div class="card-body">
                        <form action="/update-prodi/{{ $prodis->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="nama_prodi" class="form-label text-dark">Nama Program Studi</label>
                                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="{{ $prodis->nama_prodi }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ket_prodi" class="form-label text-dark">Keterangan Program Studi</label>
                                        <input type="text" class="form-control" id="ket_prodi" name="ket_prodi" value="{{ $prodis->ket_prodi }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right" name="submit">Edit Program Studi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection