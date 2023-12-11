@extends('layout.app')

@section('content')
<!-- Content -->
<h2>Add Teacher</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Teacher</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
    </ol>
</nav>

<div class="card rounded-0 shadow-sm mb-4">
    <div class="card-header bg-white pt-3">
        <h6>Tambah Guru</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="row mb-4">
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="nik">NIK</label>
                    <input id="nik" class="form-control" type="number" name="nik">
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email">
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="gender">Jenis Kelamin</label>
                    <select id="gender" class="form-select" name="gender">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="birthplace">Tempat Lahir</label>
                    <input id="birthplace" class="form-control" type="text" name="birthplace">
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="birthdate">Tanggal Lahir</label>
                    <input id="birthdate" class="form-control" type="date" name="birthdate">
                </div>
            </div>
            <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
        </form>
    </div>
</div>
<div class="card rounded-0 shadow-sm">
    <div class="card-header bg-white pt-3">
        <h6>Impor Guru</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-4">
                <label class="form-label" for="import">File CSV</label>
                <input id="import" class="form-control" type="file">
                <p class="text-danger">
                    <small>Panduan dan template impor dapat diunduh disini.</small>
                </p>
            </div>
            <button class="btn btn-success rounded-0 w-100 py-2">Impor</button> 
        </form>
    </div>
</div>

@endsection