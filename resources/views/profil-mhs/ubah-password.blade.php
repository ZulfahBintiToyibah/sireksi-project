@extends('../layouts/app-mhs')

@section('container')
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Ubah Password</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-solid fa-key"></i> Form Ubah Password</h6>
                </div>
                <div class="card-body">
                    <h6 class="text-primary">
                        <i class="fas fa-fw fa-info-circle"></i> Silahkan memasukkan password lama dan password baru Anda untuk mengubah password.
                    </h6>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="{{ route('password-change', ['id' => Auth::id()]) }}" method="POST">
                                @csrf
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="passwordLama" class="col-form-label text-dark">Password Lama</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="passwordLama" class="form-control" name="password_lama">
                                    </div>
                                </div>
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="passwordBaru" class="col-form-label text-dark">Password Baru</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="passwordBaru" class="form-control" name="password_baru">
                                    </div>
                                </div>
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="konfirmasiPasswordBaru" class="col-form-label text-dark">Konfirmasi Password Baru</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="konfirmasiPasswordBaru" class="form-control" name="password_baru_confirmation">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right btn-block" name="submit"><i class="fas fa-fw fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
