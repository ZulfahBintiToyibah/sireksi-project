@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Edit Kode Skripsi</h1>

<div class="row">
    <div class="col-lg-8">
        <!-- Default Card Example -->
        <div class="card shadow mb-4 border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Kode Skripsi</h6>
                <div class="card-tools">
                    <a href="{{ route('kodeskripsi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-4 shadow border-primary">
                    <div class="card-body">
                        <form action="/update-kodeskripsi/{{ $kodeskripsis->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3 g-3 align-items-center">
                                <div class="col-md-2">
                                    <label for="kode_skripsi" class="col-form-label text-dark">Kode</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="kode_skripsi" class="form-control text-dark" name="kode_skripsi" value="{{ $kodeskripsis->kode_skripsi }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right btn-block" name="submit"><i class="fas fa-fw fa-edit"></i> Edit Kode Skripsi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection