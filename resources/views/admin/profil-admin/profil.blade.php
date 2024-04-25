@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">My Profile</h1>

<div class="row">
    <div class="col-md-9">
        <div class="card mb-3">
            <div class="row">
                <div class="col-md-3 m-auto">
                    <img src="" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <fieldset disabled>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="nama" class="col-form-label">Nama</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nama" class="form-control" value="{{ $user ? $user->nama : '' }}">
                                </div>
                            </div>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-8">
                                        <input type="text" id="jenis_kelamin" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="no_telp" class="col-form-label">No Telepon</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="no_telp" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row mb-2 g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="alamat" class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="alamat" class="form-control" value="">
                                </div>
                            </div>
                        </fieldset>
                        <a href="/edit-profil/{id}" class="btn btn-primary btn-block"><i class="fas fa-fw fa-edit"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                </div>
            </div>
        </div>
</div>

</div>

@endsection