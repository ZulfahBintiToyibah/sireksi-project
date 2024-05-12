@extends('../layouts/app-mhs')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">My Profile</h1>

<div class="row">
    <div class="col-md-9">
        <div class="card mb-3">
            <div class="row">
                <div class="col-md-3 m-auto">
                    <img src="{{ auth()->guard('mahasiswa')->user()->foto ? asset('storage/foto-mahasiswa/' . auth()->guard('mahasiswa')->user()->foto) : asset('template/img/undraw_profile.svg') }}" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <fieldset disabled>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="nama" class="col-form-label">Nama</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nama" class="form-control" value="{{ auth()->guard('mahasiswa')->user()->nama }}">                                
                                </div>
                                </div>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="nim" class="col-form-label">NIM</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="jenis_kelamin" class="form-control" value="{{ auth()->guard('mahasiswa')->user()->nim }}">                                
                                </div>
                                </div>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="email" class="col-form-label">Program Studi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email" class="form-control" value="{{ auth()->guard('mahasiswa')->user()->prodis->nama_prodi }}">                                
                                </div>
                            </div>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="alamat" class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="alamat" class="form-control" value="{{ auth()->guard('mahasiswa')->user()->alamat }}">                                
                                </div>
                            </div>
                        </fieldset>
                        <a href="/profil-edit/{{ auth()->guard('mahasiswa')->user()->id }}" class="btn btn-primary btn-block"><i class="fas fa-fw fa-edit"></i> Edit Profile</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script SweetAlert -->
<script src="../template/sw/sweetalert2.min.js"></script>
@if(session('success'))
    <script>
        Swal.fire({
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@endsection
