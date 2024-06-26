@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Tambah Dosen Pembimbing</h1>

<div class="row">
    <div class="col-lg-8">
        <!-- Default Card Example -->
        <div class="card shadow mb-4 border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Dosen Pembimbing</h6>
                <div class="card-tools">
                    <a href="{{ route('dospem') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-4 shadow border-primary">
                    <div class="card-body">
                        <form action="/insert-dospem" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <label for="nip" class="form-label text-dark">NIP</label>
                                        <input type="number" class="form-control" id="nip" name="nip">
                                    </div>
                                    <div class="mb-2">
                                        <label for="nama" class="form-label text-dark">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="prodis_id" class="form-label text-dark">Program Studi</label>
                                        <select class="form-control selectpicker" id="prodis_id" name="prodis_id" data-live-search="true">
                                            <option value="0">-- Pilih Program Studi --</option>
                                            @foreach($dospems as $dospem)
                                                <option value="{{ $dospem->id }}">{{ $dospem->ket_prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                    <button type="submit" class="btn btn-primary float-right" name="submit">Tambah Dosen Pembimbing</button>
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