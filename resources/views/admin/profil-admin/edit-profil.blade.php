@extends('../layouts/app')

@section('container')
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Profil</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Profil</h6>
                    <div class="card-tools">
                        <a href="{{ route('profiladmin') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-body">
                                    <form action="/update-profil/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user ? $user->nama : '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenkel" class="form-label">Jenis Kelamin</label><br>
                                                    <select class="form-control" name="jenkel">
                                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                                        <option value="Laki-Laki" {{ isset($user) && $user->jenkel == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                        <option value="Perempuan" {{ isset($user) && $user->jenkel == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user ? $user->alamat : '' }}">
                                                </div>
                                                <div class="mb-0">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user ? $user->email : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ $user ? $user->username : '' }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $user ? $user->no_telp : '' }}">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="foto" class="form-label">Masukkan Foto</label>
                                                    <input type="file" class="form-control" id="foto" name="foto" value="{{ isset($user) ? $user->foto : '' }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block float-right" name="submit"><i class="fas fa-fw fa-edit"></i> Edit</button>
                                            </div>
                                        </div>
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
                                                <img src="{{ isset($user) && $user->foto ? asset('storage/foto-admin/' . $user->foto) : asset('template/img/preview/preview.png') }}" class="card-img rounded" id="preview-img">
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