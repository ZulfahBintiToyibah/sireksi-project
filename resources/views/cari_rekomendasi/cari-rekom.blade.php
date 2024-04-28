@extends('../layouts/app-mhs')

@section('container')
<div class="card-body p-3">
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-md-8 text-center">
            <img src="../template/img/login/lOGO SIREKSI.png" alt="Logo" class="img-fluid" style="max-width: 380px;">
        </div>
    </div>
    <div class="row justify-content-center align-items-center mb-2">
        <div class="col-md-6">
            <form class="navbar-search" action="/mahasiswa" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control bg-light border-1 small" placeholder="Search for..." name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection